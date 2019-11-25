<?php
require_once("./model/imagenesmodel.php");
require_once("./view/peliculasview.php");

class imagenescontroller {

    private $model;
    private $view;

    function __construct(){
        $this->model = new imagenesmodel();
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
        $id_usuario = $_SESSION['administrador'];
        return $id_usuario;
    }
   
    public function InsertarImagenes(){
        if($_FILES['input_name']['type'] == "image/jpg" || $_FILES['input_name']['type'] == "image/jpeg" || $_FILES['input_name']['type'] == "image/png" ) {
            $this->model->InsertarImagenes($_FILES['input_name'], $_POST['id_peliculasfk']);
            header("Location: " . BASE_URL);
        }
        else {
            $error = 'El tipo de archivo no esta permitido';
            $this->view->showError($error);
            die();
        }
    }
}