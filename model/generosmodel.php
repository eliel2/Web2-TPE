<?php

class generosmodel {

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_cine;charset=utf8', 'root', '');
    }
    public function GetGenero($id){
        $sentencia = $this->db->prepare( "SELECT * FROM generos WHERE id_genero = ?");
        $sentencia->execute(array($id));
        $genero = $sentencia->fetch(PDO::FETCH_OBJ);
        
        return $genero;
    }

    public function GetGeneros(){
        $sentencia = $this->db->prepare("SELECT * FROM generos ORDER BY genero asc");
        $sentencia->execute();
        $generos = $sentencia->fetchAll(PDO::FETCH_OBJ);

        return $generos;
    }
    public function InsertarGeneros($generos){

        $sentencia = $this->db->prepare("INSERT INTO generos(genero) VALUES(?)");
        $sentencia->execute(array($generos));
    }
    public function BorrarGenero($id){
        $sentencia = $this->db->prepare("DELETE FROM generos WHERE id_genero=?");
        $sentencia->execute(array($id));
    }
    public function EditarGenero($id,$genero){
        $sentencia = $this->db->prepare("UPDATE generos SET genero=? WHERE id_genero=?");
        $sentencia->execute(array($id,$genero));
    }
}