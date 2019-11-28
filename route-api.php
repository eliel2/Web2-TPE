<?php
    require_once('Router.php');
    require_once('api/api-controller/apicomentarios.php');
    
    // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

    $router = new Router();

    // rutas
    $router->addRoute("comentarios/:ID", "GET", "apicomentarios", "GetComentarios");
    $router->addRoute("comentarios/:ID", "DELETE", "apicomentarios", "DeleteComentario");
    $router->addRoute("comentarios/:ID", "POST", "apicomentarios", "AddComentarios");

    //run
    $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']); 