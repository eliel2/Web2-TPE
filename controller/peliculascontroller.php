<?php
require_once("./model/peliculasmodel.php");
require_once("./view/peliculasview.php");

class peliculascontroller {

    private $model;
    private $view;

	function __construct(){
        $this->model = new peliculamodel();
        $this->view = new peliculasview();
    }
    
    public function checkLogIn(){
        session_start();
        
        if(!isset($_SESSION['id_usuario'])){
            header("Location: " . URL_LOGIN);
            die();
        }

        if ( isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 5000)) { 
            header("Location: " . URL_LOGOUT);
            die();
        } 
        $_SESSION['LAST_ACTIVITY'] = time();
        
    }
    public function checkUser (){
        $id_usuario = $_SESSION['id_usuario'];
        return $id_usuario;
    }

    public function GetPeliculas(){
        $this->checkLogIn();
        $peliculas = $this->model->GetPeliculas();
        $id = $this->checkUser();
        $this->view->DisplayPeliculas($peliculas,$id);
    }

    public function InsertarPeliculas(){

        $this->model->InsertarPeliculas($_POST['id:'],$_POST['titulo'],$_POST['sinopsis'],$_POST['valor'] );
        header("Location: " . BASE_URL);
    }
    
    public function BorrarPelicula($params = null) {
        $id = $params[':ID'];
        $this->model->BorrarPelicula($id);
        header("Location: " . BASE_URL);
    }
}