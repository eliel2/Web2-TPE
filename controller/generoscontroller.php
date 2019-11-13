<?php
require_once("./view/generosview.php");
require_once("./model/generosmodel.php");

class generoscontroller {

    private $model;
    private $view;

    function __construct(){
        $this->view = new generosview();
        $this->model = new generosmodel();
    }
    public function checkLogIn(){
        session_start();
        
        if(!isset($_SESSION['user'])){
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
    public function GetGenero($params = null){
        $this->checkLogIn();
        $id_genero = $params[':ID'];
        $genero = $this->model->GetGenero($id_genero);

        $id = $this->checkUser();

        $this->view->ShowGenero($genero,$id);
    }
    public function GetGeneros($params = null){
        $this->checkLogIn();
        $generos = $this->model->GetGeneros();

        $id = $this->checkUser();

        $this->view->ShowGeneros($generos,$id);
    }
    public function MostrarEditarG($params = null){
        $this->checkLogIn();
        $id_genero = $params[':ID'];
        $genero = $this->model->GetGenero($id_genero);
        $id = $this->checkUser();

        $this->view->MostrarEditarG($id,$genero);

    }
    public function InsertarGeneros(){
        $this->model->InsertarGeneros($_POST['id:'],$_POST['genero']);
        header("Location: " . BASE_GENERO);
    }
    public function BorrarGenero($params = null) {
        $id = $params[':ID'];
        $this->model->BorrarGenero($id);
        header("Location: " . BASE_GENERO);
    }
    public function EditarGenero(){
        $this->checkLogIn();

        $this->model->EditarGenero($_POST['genero'],$_POST['id_genero']);
        
        header("Location: " . BASE_GENERO);
    }
};