<?php

require('libs/Smarty.class.php');
class peliculasview {
    private $smarty;

    function __construct(){

        $this->smarty = new Smarty();
        $this->smarty->assign('BASE_URL',BASE_URL);
    }

    public function DisplayPeliculas($peliculascongenero,$id){

        $this->smarty->assign('titulo',"Peliculas");
        $this->smarty->assign('peliculascongenero',$peliculascongenero);
        $this->smarty->assign('id_usuario',$id);
        
        $this->smarty->display('templates/peliculas.tpl');
    }
    public function ShowPelicula($pelicula) {
        $this->smarty->assign('pelicula', $pelicula);
        $this->smarty->assign('titulo',"Detalle de Pelicula");
        
        $this->smarty->display('templates/pelicula.tpl');
        }
    };
