
<?php

class UserModel {

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_cine;charset=utf8', 'root', '');
    }
    public function GetPassword($user){
        $sentencia = $this->db->prepare( "SELECT * FROM usuarios WHERE usuario = ?");
        $sentencia->execute(array($user));
        
        $password = $sentencia->fetch(PDO::FETCH_OBJ);
        
        return $password;
    }

    public function GetUsuarios(){
        $sentencia = $this->db->prepare("SELECT * FROM usuarios");
        $sentencia->execute();
        $usuarios = $sentencia->fetchAll(PDO::FETCH_OBJ);

        return $usuarios;
    }
    
    public function BorrarUser($id){
        $sentencia = $this->db->prepare("DELETE FROM usuarios WHERE id_usuario=?");
        $sentencia->execute(array($id));
    }

    public function AgregarAdmin($usuario,$id){
        $sentencia = $this->db->prepare("UPDATE usuarios SET administrador=? WHERE id_usuario=?");
        $sentencia->execute(array($id,$usuario));
    }
}