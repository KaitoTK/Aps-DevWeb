<?php
    include "./config/db.php";
    include "./config/system.php";
    include "./controller/baseController.php";
    include "./controller/doggoController.php";
    include "./controller/adocaoController.php";

    require_once "routes.php";

    $urlEndpoint = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    
    $chooseRoute = $routes[$urlEndpoint];
    if($chooseRoute === null){
        echo "404";
        return;
    }
    
    $controller = new $chooseRoute["controller"]();
    $action = $chooseRoute['action'];
    $controller->$action();

?>