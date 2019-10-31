<?php

class peliculamodel {

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_cine;charset=utf8', 'root', '');
    } 

	public function Getpeliculas(){
        $sentencia = $this->db->prepare( "SELECT * FROM peliculas");
        $sentencia->execute();
        $peliculas = $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        return $peliculas;
    }

    public function GetPelicula($id){
        $sentencia = $this->db->prepare( "SELECT * FROM peliculas WHERE id_pelicula = ?");
        $sentencia->execute(array($id));
        $pelicula = $sentencia->fetch(PDO::FETCH_OBJ);
        
        return $pelicula;
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

    public function EditarPeliculas($titulo,$sinopsis,$id_generoFK,$id){
        $sentencia = $this->db->prepare("UPDATE peliculas SET titulo=?,sinopsis=?,id_generoFK=? WHERE id_pelicula=?");
        $sentencia->execute(array($titulo,$sinopsis,$id_generoFK,$id));
    }

    public function Insertarpeliculas($id,$titulo,$sinopsis,$id_generoFk){

        $sentencia = $this->db->prepare("INSERT INTO peliculas(id_pelicula,titulo, sinopsis, id_generoFK) VALUES(?,?,?,?)");
        $sentencia->execute(array($id,$titulo,$sinopsis,$id_generoFk));
    }

    public function BorrarPelicula($id){
        $sentencia = $this->db->prepare("DELETE FROM peliculas WHERE id_pelicula=?");
        $sentencia->execute(array($id));
    }
    public function InsertarGeneros($id,$generos){

        $sentencia = $this->db->prepare("INSERT INTO generos(id_genero,genero) VALUES(?,?)");
        $sentencia->execute(array($id,$generos));
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