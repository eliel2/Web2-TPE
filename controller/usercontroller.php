<?php

require_once("./model/usermodel.php");
require_once("./view/userview.php");
require_once("./src/PHPMailer.php");
require_once("./src/SMTP.php");
require_once("./src/Exception.php");


class usercontroller {

    private $model;
    private $view;
    private $mail;

	function __construct(){
        $this->model = new UserModel();
        $this->mail = $mail = new PHPMailer\PHPMailer\PHPMailer();;
        $this->view = new UserView();
    }
    
    public function checkLogIn(){
        session_start();


        if ( isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 5000)) { 
            header("Location: " . URL_LOGOUT);
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
        $id = $this->checkUser();
        if ($id == 1){
            $users = $this->model->GetUsuarios();
            $this->view->AdminUser($id,$users);

        } else {
            header("Location: " . BASE_URL);
        }

    }

    public function MostrarRecuperacion (){
        $this->view->Recuperacion();
    }
    
    public function VerCambiarContrasena($params =null){
        $id = $params[':ID'];
        $usuario = $this->model->GetUsuario($id);

        $this->view->CambiarContrasena($usuario);
    }
    
    public function RecuperarContra (){
        
        $this->mail->isSMTP();
        
        $this->mail->SMTPDebug = 2;
        
        $this->mail->Host = 'smtp.gmail.com';
        
        $this->mail->Port = 587;

        $this->mail->SMTPSecure = 'tls';

        $this->mail->SMTPAuth = true;

        $this->mail->Username = "cinetudai@gmail.com";
    
        $this->mail->Password = "eliellucas";
        
        $this->mail->setFrom('cinetudai@gmail.com', 'Cine TUDAI');

        $user = $_POST["usuarior"];
        $email = $_POST["emailr"];

        $usuario = $this->model->GetUsuariobyUser($user);
        $id = $usuario->id_usuario;

        $this->mail->addAddress($email, $user);

        $this->mail->Body = "Hola ".$user." le enviamos el siguiente link: http://localhost/Proyectos/Web2-TPE/nuevacontrasena/".$id." para que pueda recuperar su contraseña, en caso de que no lo haya solicitado ignore este mail. Saludos desde Cine TUDAI.";
        
        $this->mail->Subject = 'Recuperar contrasen a';
        
        if (!$this->mail->send()) {
            echo "Mailer Error: " . $this->mail->ErrorInfo;
            header("Location: " . olvidosucontrasena);

        } else {
            echo "Message sent!";
            header("Location: " . user);
    }
}
    public function CambiarConstrasena(){
        $this->model->CambiarConstrasena($_POST['usuarion'],$_POST['emailn'],$_POST['nuevacontra'],$_POST['id_usuario']);
        header("Location: " . user);
    }
}