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
    public function GetGeneros (){
        $sentencia = $this->db->prepare("SELECT * FROM generos");
        $sentencia->execute();
        $generos = $sentencia->fetchAll(PDO::FETCH_OBJ);

        return $generos;
    }
    

    
    public function Insertarpeliculas($id,$titulo,$sinopsis,$valor){

        $sentencia = $this->db->prepare("INSERT INTO peliculas(id_pelicula,titulo, sinopsis, valor) VALUES(?,?,?,?)");
        $sentencia->execute(array($id,$titulo,$sinopsis,$valor));
    }
    public function BorrarPelicula($id){
        $sentencia = $this->db->prepare("DELETE FROM peliculas WHERE id_pelicula=?");
        $sentencia->execute(array($id));
    }
}