<?php
require_once("./model/registrarmodel.php");
require_once("./view/registrarview.php");

class registrarcontroller {

    private $model;
    private $view;

	function __construct(){
        $this->model = new registrarmodel();
        $this->view = new registrarview();
    }
    public function Registrar(){
        if (($_POST['usuario'] != '') && ($_POST['email'] != '') && ($_POST['contrasena'] != '')){
            $this->model->Registrar($_POST['usuario'],$_POST['email'],$_POST['contrasena']);
            session_start();
            $_SESSION['user'] = $_POST['usuario'];
            $_SESSION['administrador'] = 0;
            header("Location: " . BASE_URL);
        }else{
            header("Location: " . registro);
        } 
    }
    public function DisplayRegistro(){
        $this->view->DisplayRegistro();
    }
}