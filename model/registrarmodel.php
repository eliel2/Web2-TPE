<?php

    class registrarmodel {

        private $db;

        function __construct(){
            $this->db = new PDO('mysql:host=localhost;'.'dbname=db_cine;charset=utf8', 'root', '');
        }

        public function Registrar ($usuario,$mail,$password,$respuesta){
            $hash = password_hash($password, PASSWORD_DEFAULT);
            
                $sentencia = $this->db->prepare("INSERT INTO usuarios(usuario,email,contrasena,respuesta) VALUES(?,?,?,?)");
                $sentencia->execute(array($usuario,$mail,$hash,$respuesta));
            }
    }   