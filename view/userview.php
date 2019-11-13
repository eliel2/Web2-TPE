<?php

require_once('libs/Smarty.class.php');


class UserView {
    private $smarty;

    function __construct(){
      $this->smarty = new Smarty();
    }

    public function DisplayUser(){

        $this->smarty->assign('titulo',"user");
        $this->smarty->assign('BASE_URL',BASE_URL);
        $this->smarty->display('templates/user.tpl');
    }

    public function AdminUser($id,$users){
        $this->smarty->assign('titulo',"user");
        $this->smarty->assign('BASE_URL',BASE_URL);
        $this->smarty->assign('usuarios',$users);
        $this->smarty->assign('admin', $id);
        $this->smarty->display('templates/adminuser.tpl');
    }
}