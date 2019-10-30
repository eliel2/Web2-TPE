<?php


require_once('controller/peliculascontroller.php');
require_once('controller/usercontroller.php');
require_once('controller/registrarcontroller.php');
require_once('Router.php');

define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
define("URL_LOGIN", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/user');
define("URL_LOGOUT", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/logout');


$r = new Router();

$r->addRoute("peliculas", "GET", "peliculascontroller", "GetPeliculas");
$r->addRoute("pelicula/:ID","GET","peliculascontroller","GetPelicula");
$r->addRoute("insertar", "POST", "peliculascontroller", "InsertarPeliculas");
$r->addRoute("user","GET","usercontroller","DisplayUser");
$r->addRoute("editar/:ID","GET","peliculascontroller","MostrarEditar");
$r->addRoute("editar","POST","peliculascontroller","EditarPeliculas");
$r->addRoute("iniciarSesion","POST","usercontroller","IniciarSesion");
$r->addRoute("registro","GET","registrarcontroller","DisplayRegistro");
$r->addRoute("registrar","POST","registrarcontroller","Registrar");
$r->addRoute("logout","GET","usercontroller","Logout");
$r->addRoute("borrar/:ID", "GET", "peliculascontroller", "BorrarPelicula");

$r->setDefaultRoute("peliculascontroller", "GetPeliculas");

$r->route($_GET['action'], $_SERVER['REQUEST_METHOD']);