<?php
class ComentariosModel{
    private $db;
    function _construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_cine;charset=utf8', 'root', '');
    }
    public function GetComentarios(){
        $sentencia = $this->db->prepare("SELECT * FROM comentarios");
        $sentencia->execute();
        $comentarios = $sentencia->fetchAll(PDO::FETCH_OBJ);

        return $comentarios;
    }
    public function GetComentario($id){
        $sentencia = $this->db->prepare( "SELECT * FROM comentarios WHERE id_comentarios = ?");
        $sentencia->execute([$id]);
        $comentario = $sentencia->fetch(PDO::FETCH_OBJ);
        
        return $comentario;
    }
    public function BorrarComentario($id){
        $sentencia = $this->db->prepare("DELETE FROM comentarios WHERE id_comentario=?");
        $sentencia->execute(array($id));
    }
    public function InsertarGeneros($comentarios,$puntaje){

        $sentencia = $this->db->prepare("INSERT INTO comentarios(comentarios,puntaje) VALUES(?,?)");
        $sentencia->execute(array($comentarios,$puntaje));
    }
}