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

    public function AgregarAdmin(){
        $this->model->AgregarAdmin($_POST['admin'],$_POST['valoradmin']);
        header("Location: " . BASE_USER);
    }

    public function BorrarUser($params = null){
        $id = $params[':ID'];
        $this->model->BorrarUser($id);
        header("Location: " . BASE_USER);
    }

    public function GetUsuarios(){
        $this->checkLogIn();
        $users = $this->model->GetUsuarios();

        $id = $this->checkUser();

        $this->view->AdminUser($id,$users);
    }
}