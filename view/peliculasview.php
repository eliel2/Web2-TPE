<?php

require('libs/Smarty.class.php');
class peliculasview {

    function __construct(){

    }

    public function DisplayPeliculas($peliculascongenero,$id){

            $smarty = new Smarty();
            $smarty->assign('titulo',"Peliculas");
            $smarty->assign('BASE_URL',BASE_URL);
            $smarty->assign('peliculascongenero',$peliculascongenero);
            $smarty->assign('id_usuario',$id);
            $smarty->display('templates/peliculas.tpl');
           
        }      
    };
