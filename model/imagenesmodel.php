<?php

class imagenesmodel {

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_cine;charset=utf8', 'root', '');
    }
 private function SubirImagen($imagen){
        $target = 'imagenes/peliculas/' . uniqid() . '.jpg';
        move_uploaded_file($imagen, $target);
        return $target;
    }
    public function GetImagen(){
        $sentencia = $this->db->prepare("SELECT * FROM imagenes ORDER BY imagen asc");
        $sentencia->execute();
        $imagen = $sentencia->fetchAll(PDO::FETCH_OBJ);

        return $imagen;
    }
    public function InsertarImagenes($id_imagen,$imagen,$id_peliculasFk){

        $sentencia = $this->db->prepare("INSERT INTO imagen(id_imagen,imagen,id_peliculasfk) VALUES(?,?,?)");
        $sentencia->execute(array($id_imagen,$imagen,$id_peliculasFk));
    }

    public function GetImagenesPorPelicula($id_pelicula){
        $sentencia = $this->db->prepare("SELECT * FROM imagenes where (id_peliculasfk = ?)");
        $sentencia->execute([$id_pelicula]);
        $imagenes = $sentencia->fetch(PDO::FETCH_OBJ);

        return $imagenes;
    }
}