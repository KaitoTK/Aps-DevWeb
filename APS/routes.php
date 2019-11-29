<?php

    // GERAL
    $routes["/"] = ["controller" => "baseController", "action" => "index"];
    $routes["/home"] = ["controller" => "baseController", "action" => "index"];

    // DOGGO
    $routes["/inserir_doggo"] = ["controller" => "baseController", "action" => "inserir_doggo"];
    $routes["/atualiza_doggo"] = ["controller" => "baseController", "action" => "atualizar_doggo"];
    $routes["/goodest_boi"] = ["controller" => "baseController", "action" => "goodest_boi"];

    // ADOCAO
    $routes["/adota_doggo"] = ["controller" => "baseController", "action" => "adotar_doggo"];
    $routes["/doggos_felizes"] = ["controller" => "baseController", "action" => "listar_doggos_felizes"];

    //API
    $routes["/api/atualiza_doggo"] = ["controller" => "doggoController", "action" => "atualiza_doggo"];
    $routes["/api/inserir_doggo"] = ["controller" => "doggoController", "action" => "inserir_doggo"];
    $routes["/api/adota_doggo"] = ["controller" => "adocaoController", "action" => "adota_doggo"];


?>