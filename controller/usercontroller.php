<?php
require_once("./model/usermodel.php");
require_once("./view/userview.php");

class usercontroller {

    private $model;
    private $view;

	function __construct(){
        $this->model = new UserModel();
        $this->view = new UserView();
    }
    public function IniciarSesion(){
        $password = $_POST['pass'];
        
        $usuario = $this->model->GetPassword($_POST['user']);
        
        if (isset($usuario) && $usuario != null && password_verify($password, $usuario->contrasena)){
            session_start();
            $_SESSION['user'] = $usuario->usuario;
            $_SESSION['id_usuario'] = $usuario->id_usuario;
            $_SESSION['administrador'] = $usuario->administrador;
            header("Location: " . BASE_URL);
        }else{
            header("Location: " . URL_LOGIN);
        }
    }
    public function DisplayUser() {
        $this->view->DisplayUser();
    }
    
    public function Logout(){
        session_start();
        session_destroy();
        header("Location: " . URL_LOGIN);
    }
}