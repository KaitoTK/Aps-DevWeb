<?php
include('config/dbConfig.php');
include('config/systemConfig.php');

require_once "routes.php";

$urlWay = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
$way = str_replace(SystemConfig::path(), "", $urlWay);

$selectRoute = $routes[$way];
if ($selectRoute === null) {
    echo "PAGINA NÃO ENCONTRADA";
    return;
}

include('./model/patrimonioDAO.php');
include('./model/patrimonio.php');

include('./model/usuarioDAO.php');
include('./model/usuario.php');

include "controller/PatrimonioController.php";
include "controller/UsuarioController.php";
include "controller/LayoutController.php";

$controller = new $selectRoute['controller']();
$action = $selectRoute['action'];
$controller->$action();

