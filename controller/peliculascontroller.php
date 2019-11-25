|<?php
require_once("./model/peliculasmodel.php");
require_once("./view/peliculasview.php");
require_once("./model/generosmodel.php");
require_once("./model/imagenesmodel.php");

class peliculascontroller {

    private $model;
    private $view;
    private $generomodel;
    private $imagenesmodel;

	function __construct(){
        $this->model = new peliculamodel();
        $this->view = new peliculasview();
        $this->generomodel = new generosmodel();
        $this->imagenesmodel = new imagenesmodel();
    }
    
    public function checkLogIn(){
        session_start();

        if ( isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 5000)) {
            session_destroy(); 
            header("Location: " . URL_LOGOUT);
            die();
        } 
        $_SESSION['LAST_ACTIVITY'] = time();
        
    }
    public function checkUser (){
        if (isset ($_SESSION['administrador'])){
            $id_usuario = $_SESSION['administrador'];
        }else{
            $id_usuario = 0;
        }
        return $id_usuario;
    }
    public function retornarUser(){
        if (isset($_SESSION['usuario'])){
            $usuario = $_SESSION['usuario'];
        }else {
            $usuario= null;
        }
        return $usuario;
    }

    public function GetPeliculas(){
        $this->checkLogIn();
        $peliculascongenero = $this->getPeliculasConGenero();
        
        $id = $this->checkUser();
        $usuario = $this->retornarUser();
        $generos = $this->generomodel->GetGeneros();

        $this->view->DisplayPeliculas($peliculascongenero,$usuario,$id,$generos);
    }

    public function GetPelicula($params = null){
        $this->checkLogIn();
        $id_peliculas = $params[':ID'];
        $pelicula = $this->model->GetPelicula($id_peliculas);
        $genero = $this->generomodel->GetGenero($pelicula->id_generoFK);
        $imagen = $this->imagenesmodel->GetImagen($pelicula->id_pelicula);

        $id = $this->checkUser();
        $peliculacontodo = array();
            $p['genero']= $genero->genero;
            $p['id_genero']=$genero->id_genero;
            $p['id_pelicula'] = $pelicula->id_pelicula;
            $p['titulo'] = $pelicula->titulo;
            $p['sinopsis'] = $pelicula->sinopsis;
            if ($imagen){
                $p['id_imagen'] = $imagen->id_peliculasfk;
                $p['imagen'] = $imagen->imagen;
            }
            array_push($peliculacontodo, $p);
        
        $this->view->ShowPelicula($peliculacontodo,$id);
    }
    
 
    public function MostrarEditar($params = null){
        $this->checkLogIn();
        $id_pelicula = $params[':ID'];
        $pelicula = $this->model->GetPelicula($id_pelicula);
        $generos = $this->generomodel->GetGeneros();

        $id = $this->checkUser();

        $this->view->MostrarEditar($pelicula,$id,$generos);

    }

    function getPeliculasConGenero() {

        $peliculas = $this->model->Getpeliculas();
        $generos = $this->generomodel->GetGeneros();      
        $imagenes = $this->imagenesmodel->GetImagenes();

        $peliculascongenero = array();
        foreach($generos as $genero) {
            $p['genero']= $genero->genero;
            $p['id_genero']=$genero->id_genero;
            foreach ($peliculas as $pelicula){
                if ($genero->id_genero == $pelicula ->id_generoFK){
                    $p['id_pelicula'] = $pelicula->id_pelicula;
                    $p['titulo'] = $pelicula->titulo;
                    $p['sinopsis'] = $pelicula->sinopsis;
                    foreach ($imagenes as $imagen){
                        if ($pelicula->id_pelicula == $imagen->id_peliculasfk){
                            $p['id_imagen'] = $imagen->id_peliculasfk;
                            $p['imagen'] = $imagen->imagen;
                        }
                    }
                    array_push($peliculascongenero, $p);
                }
            }
        }
        return $peliculascongenero;
    }

    public function InsertarPeliculas(){
        $this->model->InsertarPeliculas($_POST['id:'],$_POST['titulo'],$_POST['sinopsis'],$_POST['id_generoFK'] );
        header("Location: " . BASE_URL);
    }

    public function BorrarPelicula($params = null) {
        $id = $params[':ID'];
        $this->imagenesmodel->BorrarImagen($id);
        $this->model->BorrarPelicula($id);
        header("Location: " . BASE_URL);
    }
    public function EditarPeliculas(){
        $this->checkLogIn();

        $this->model->EditarPeliculas($_POST['tituloe'],$_POST['sinopsise'],$_POST['id_generoFKe'],$_POST['id_pelicula']);
        
        header("Location: " . BASE_URL);
    }
}