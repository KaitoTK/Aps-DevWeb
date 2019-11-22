<?php

    $routes["/"] = ["controller" => "baseController", "action" => "index"];

    $routes["/inserir_doggo"] = ["controller" => "baseController", "action" => "inserir_doggo"];

    $routes["/api/lista_doggos"] = ["controller" => "doggoController", "action" => "lista_doggos"];
    $routes["/api/inserir_doggo"] = ["controller" => "doggoController", "action" => "inserir_doggo"];


?>