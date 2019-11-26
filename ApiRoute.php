<?php
require_once('Router.php');
require_once('./api/api-controller/apicomentarios.php');

define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
//define("URL_COMENT", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/comentarios');

$router = new Router();

 $router->addRoute("pelicula/:ID/comentarios", "GET", "comentariosapicontroller", "GetComentarios");
 $router->addRoute("pelicula/:ID/comentarios/:ID", "DELETE", "comentariosapicontroller", "DeleteComentario");
 $router->addRoute("pelicula/:ID/comentarios", "POST", "comentariosapicontroller", "AddComentario");

 $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']); 
