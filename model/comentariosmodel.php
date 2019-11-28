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

    public function GetComentario($id){
        $sentencia = $this->db->prepare("SELECT * FROM comentarios WHERE id_comentario = ?");
        $sentencia->execute(array($id));
        $comentario = $sentencia->fetch(PDO::FETCH_ASSOC);
        
        return $comentario;
    }

    public function BorrarComentario($id){
        $sentencia = $this->db->prepare("DELETE FROM comentarios WHERE id_peliculafk=?");
        $sentencia->execute(array($id));
    }
    public function InsertarComentarios($comentarios,$puntaje,$id_peliculafk){

        $sentencia = $this->db->prepare("INSERT INTO comentarios(comentarios,puntaje,id_peliculafk) VALUES(?,?,?)");
        $sentencia->execute(array($comentarios,$puntaje,$id_peliculafk));

        return $this->db->lastInsertId();
    }
}