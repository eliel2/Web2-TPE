<?php
require_once("./model/registrarmodel.php");
require_once("./view/registrarview.php");
require_once("./model/usermodel.php");

class registrarcontroller {

    private $model;
    private $view;
    private $umodel;

	function __construct(){
        $this->model = new registrarmodel();
        $this->view = new registrarview();
        $this->umodel = new usermodel();
    }
    public function Registrar(){
        $users = $this->umodel->GetUsuarios();
        if (($_POST['usuario'] != '') && ($_POST['email'] != '') && ($_POST['contrasena'] != '') && ($_POST['pregunta'] != '')){
            foreach($users as $usuario){
                if(($_POST['usuario'] != $usuario->usuario) && ($_POST['email'] != $usuario->email)){
                    $repetida = false;
                }else{
                    $repetida = true;
                    $error = 'Usuario o email ya existen';
                    $this->view->showError($error);
                }
            }
            if($repetida == false){
                $this->model->Registrar($_POST['usuario'],$_POST['email'],$_POST['contrasena'],$_POST['pregunta']);
                session_start();
                $_SESSION['user'] = $_POST['usuario'];
                $_SESSION['administrador'] = 0;
                header("Location: " . BASE_URL);
            }
        }else{
            header("Location: " . registro);
        }
    }
    public function DisplayRegistro(){
        $this->view->DisplayRegistro();
    }
}