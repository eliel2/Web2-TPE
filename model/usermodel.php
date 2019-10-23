
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

}