|<?php
require_once("./model/peliculasmodel.php");
require_once("./view/peliculasview.php");
require_once("./model/generosmodel.php");

class peliculascontroller {

    private $model;
    private $view;
    private $generomodel;

	function __construct(){
        $this->model = new peliculamodel();
        $this->view = new peliculasview();
        $this->generomodel = new generosmodel();
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
        $id_usuario = $_SESSION['administrador'];
        return $id_usuario;
    }

    public function GetPeliculas(){
        $this->checkLogIn();
        $peliculascongenero = $this->getPeliculasConGenero();

        $id = $this->checkUser();
        $generos = $this->generomodel->GetGeneros();

        $this->view->DisplayPeliculas($peliculascongenero,$id,$generos);
    }

    public function GetPelicula($params = null){
        $this->checkLogIn();
        $id_pelicula = $params[':ID'];
        $pelicula = $this->model->GetPelicula($id_pelicula);

        $id = $this->checkUser();

        $this->view->ShowPelicula($pelicula,$id);
    }
    
 
    public function MostrarEditar($params = null){
        $this->checkLogIn();
        $id_pelicula = $params[':ID'];
        $pelicula = $this->model->GetPelicula($id_pelicula);
        $generos = $this->generomodel->GetGeneros();

        $id = $this->checkUser();

        $this->view->MostrarEditar($pelicula,$id,$generos);

    }

    function getPeliculasConGenero() {

        $peliculas = $this->model->Getpeliculas();

        $generos = $this->generomodel->GetGeneros();

        $peliculascongenero = array();
        foreach($generos as $genero) {
            $p['genero']= $genero->genero;
            $p['id_genero']=$genero->id_genero;
            foreach ($peliculas as $pelicula){
                if ($genero->id_genero == $pelicula ->id_generoFK){
                    $p['id_pelicula'] = $pelicula->id_pelicula;
                    $p['titulo'] = $pelicula->titulo;
                    $p['sinopsis'] = $pelicula->sinopsis;
                    array_push($peliculascongenero, $p);
                }
            }
        }
        return $peliculascongenero;
    }

    public function InsertarPeliculas(){
        $this->model->InsertarPeliculas($_POST['id:'],$_POST['titulo'],$_POST['sinopsis'],$_POST['id_generoFK'] );
        header("Location: " . BASE_URL);
    }

    public function BorrarPelicula($params = null) {
        $id = $params[':ID'];
        $this->model->BorrarPelicula($id);
        header("Location: " . BASE_URL);
    }
    public function EditarPeliculas(){
        $this->checkLogIn();

        $this->model->EditarPeliculas($_POST['tituloe'],$_POST['sinopsise'],$_POST['id_generoFKe'],$_POST['id_pelicula']);
        
        header("Location: " . BASE_URL);
    }
}