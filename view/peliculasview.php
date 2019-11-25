<?php

require_once('libs/Smarty.class.php');
class peliculasview {
    private $smarty;

    function __construct(){

        $this->smarty = new Smarty();
        $this->smarty->assign('BASE_URL',BASE_URL);
        $this->smarty->assign('BASE_URL',BASE_GENERO);
       
    }

    public function DisplayPeliculas($peliculascongenero,$usuario,$id,$generos){

        $this->smarty->assign('titulo',"Peliculas");
        $this->smarty->assign('peliculascongenero',$peliculascongenero);
        $this->smarty->assign('admin',$id);
        if ($usuario != null){
            $this->smarty->assing('id_usuario',$usuario);
        }
        $this->smarty->assign('generos',$generos);
        
        $this->smarty->display('templates/peliculas.tpl');
    }
    public function ShowPelicula($pelicula,$id) {

        $this->smarty->assign('pelicula', $pelicula);
        $this->smarty->assign('titulo',"Detalle de Pelicula");
        $this->smarty->assign('admin', $id);
        
        $this->smarty->display('templates/pelicula.tpl');
    }

    public function MostrarEditar($pelicula,$id,$generos){
        $this->smarty->assign('titulo',"Peliculas");
        $this->smarty->assign('pelicula',$pelicula);
        $this->smarty->assign('admin', $id);
        $this->smarty->assign('generos',$generos);
        
        $this->smarty->display('templates/editar.tpl');
    }
};
