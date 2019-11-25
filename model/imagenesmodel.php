<?php

class imagenesmodel {

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_cine;charset=utf8', 'root', '');
    }
<<<<<<< HEAD

    public function GetImagenes(){
        $sentencia = $this->db->prepare("SELECT * FROM imagenes ORDER BY imagen asc");
        $sentencia->execute();
        $imagenes = $sentencia->fetchAll(PDO::FETCH_OBJ);

        return $imagenes;
    } 
    
    public function GetImagen($id){
        $sentencia = $this->db->prepare( "SELECT * FROM imagenes WHERE id_peliculasfk = ?");
        $sentencia->execute(array($id));
        $imagen = $sentencia->fetch(PDO::FETCH_OBJ);
        
        return $imagen;
    }

    public function InsertarImagenes($imagen = null,$id_peliculasFk) {
        $pathImg = null;
        if ($imagen)
            $pathImg = $this->uploadImage($imagen);

        $sentencia = $this->db->prepare("INSERT INTO imagenes(imagen,id_peliculasfk) VALUES(?,?)");
        $sentencia->execute(array($pathImg,$id_peliculasFk));

    }

    private function uploadImage($image){
        $target = "img/" . uniqid() . "." . strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));  
        move_uploaded_file($image['tmp_name'], $target);
        return $target;
    }
    
    public function BorrarImagen($id){
        $sentencia = $this->db->prepare("DELETE FROM imagenes WHERE id_peliculasfk=?");
        $sentencia->execute(array($id));
=======
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
>>>>>>> 5f6b399657fb1a7742baa24971ebd525c170d4c1
    }
}