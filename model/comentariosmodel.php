<?php

class comentariosmodel{

    private $db;

    function __construct(){

        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_cine;charset=utf8', 'root', '');
    }
    
    public function GetComentarios($id){
        $sentencia = $this->db->prepare("SELECT * FROM comentarios WHERE id_peliculafk = ?");
        $sentencia->execute(array($id));
        $comentario = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        
        return $comentario;
    }
}