<?php

require('libs/Smarty.class.php');
class peliculasview {

    function __construct(){

    }

    public function DisplayPeliculas($peliculas,$id){

            $smarty = new Smarty();
            $smarty->assign('titulo',"Peliculas");
            $smarty->assign('BASE_URL',BASE_URL);
            $smarty->assign('lista_peliculas',$peliculas);
            $smarty->assign('id_usuario',$id);
            $smarty->display('templates/peliculas.tpl');
           
        }      
    };
