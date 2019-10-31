<?php

require('libs/Smarty.class.php');
class peliculasview {
    private $smarty;

    function __construct(){

        $this->smarty = new Smarty();
        $this->smarty->assign('BASE_URL',BASE_URL);
        $this->smarty->assign('BASE_URL',BASE_GENERO);
       
    }

    public function DisplayPeliculas($peliculascongenero,$id,$generos){

        $this->smarty->assign('titulo',"Peliculas");
        $this->smarty->assign('peliculascongenero',$peliculascongenero);
        $this->smarty->assign('id_usuario',$id);
        $this->smarty->assign('generos',$generos);
        
        $this->smarty->display('templates/peliculas.tpl');
    }
    public function ShowPelicula($pelicula,$id) {
        $this->smarty->assign('pelicula', $pelicula);
        $this->smarty->assign('titulo',"Detalle de Pelicula");
        $this->smarty->assign('id_usuario', $id);
        $this->smarty->display('templates/pelicula.tpl');
        }
        public function ShowGenero($genero,$id) {
            $this->smarty->assign('genero', $genero);
            $this->smarty->assign('titulo',"genero");
            $this->smarty->assign('id_usuario', $id);
            $this->smarty->display('templates/genero.tpl');
            }
    public function MostrarEditar($pelicula,$id,$generos){
        $this->smarty->assign('titulo',"Peliculas");
        $this->smarty->assign('pelicula',$pelicula);
        $this->smarty->assign('id_usuario', $id);
        $this->smarty->assign('generos',$generos);
        
        $this->smarty->display('templates/editar.tpl');
    }
    public function MostrarEditarG($id,$genero){
        $this->smarty->assign('titulo',"Generos");
        $this->smarty->assign('genero',$genero);
        $this->smarty->assign('id_usuario', $id);
        
        $this->smarty->display('templates/editargenero.tpl');
    }
    public function ShowGeneros($generos,$id) {
        $this->smarty->assign('titulo',"generos");
        $this->smarty->assign('generos', $generos);
        $this->smarty->assign('id_usuario', $id);
        $this->smarty->display('templates/generos.tpl');
        }
    };
