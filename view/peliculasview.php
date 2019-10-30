<?php

require('libs/Smarty.class.php');
class peliculasview {
    private $smarty;

    function __construct(){

        $this->smarty = new Smarty();
        $this->smarty->assign('BASE_URL',BASE_URL);
    }

    public function DisplayPeliculas($peliculascongenero,$id,$generos){

        $this->smarty->assign('titulo',"Peliculas");
        $this->smarty->assign('peliculascongenero',$peliculascongenero);
        $this->smarty->assign('id_usuario',$id);
        $this->smarty->assign('generos',$generos);
        
        $this->smarty->display('templates/peliculas.tpl');
    }
    public function ShowPelicula($pelicula) {
        $this->smarty->assign('pelicula', $pelicula);
        $this->smarty->assign('titulo',"Detalle de Pelicula");
        
        $this->smarty->display('templates/pelicula.tpl');
        }
    public function MostrarEditar($pelicula,$id,$generos){
        $this->smarty->assign('titulo',"Peliculas");
        $this->smarty->assign('pelicula',$pelicula);
        $this->smarty->assign('id_usuario',$id);
        $this->smarty->assign('generos',$generos);
        
        $this->smarty->display('templates/editar.tpl');
    }
    };
