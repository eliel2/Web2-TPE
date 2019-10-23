<?php

require_once('libs/Smarty.class.php');


class UserView {

    function __construct(){
    }

    public function DisplayUser(){

        $smarty = new Smarty();
        $smarty->assign('titulo',"user");
        $smarty->assign('BASE_URL',BASE_URL);
        $smarty->display('templates/user.tpl');
    }
}