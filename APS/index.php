<?php
    include "./config/system.php";
    include "./config/db.php";
    include "./controller/baseController.php";

    require_once "routes.php";

    $urlEndpoint = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $endpoint = str_replace(system::path(), "", $urlEndpoint);

    $chooseRoute = $routes[$endpoint];
    if($chooseRoute === null){
        echo "404";
        return;
    }
    

    $controller = new $chooseRoute["controller"]();
    $action = $chooseRoute['action'];
    $controller->$action();

?>