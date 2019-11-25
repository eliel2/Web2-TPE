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

        if ( isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 5000)) {
            session_destroy();
            header("Location: " . URL_LOGOUT);
        } 
        $_SESSION['LAST_ACTIVITY'] = time();
        
    }
    public function checkUser (){
        if (isset ($_SESSION['administrador'])){
            $id_usuario = $_SESSION['administrador'];
        }else{
            $id_usuario = 0;
        }
        return $id_usuario;
    }
    public function GetGenero($params = null){
        $this->checkLogIn();
        $id_genero = $params[':ID'];
        $genero = $this->model->GetGenero($id_genero);

        $id = $this->checkUser();
        if (isset($_SESSION['usuario'])){
            $usuario = $_SESSION['usuario'];
        }else {
            $usuario= null;
        }
        $this->view->ShowGenero($genero,$usuario,$id);
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