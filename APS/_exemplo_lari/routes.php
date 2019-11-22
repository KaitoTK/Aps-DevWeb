<?php

$routes["/"] = ["controller" => "LayoutController", "action" => "index"];

//Geral
$routes["/login"] = ["controller" => "LayoutController", "action" => "login"];
$routes["/sair"] = ["controller" => "LayoutController", "action" => "sair"];
$routes["/fazer-login"] = ["controller" => "LayoutController", "action" => "fazerLogin"];
$routes["/home"] = ["controller" => "LayoutController", "action" => "index"];
$routes["/usuarios"] = ["controller" => "LayoutController", "action" => "listarUsuarios"];

//Patrimônio 
$routes["/cadastrar-patrimonio"] = ["controller" => "LayoutController", "action" => "cadastrarPatrimonio"];
$routes["/atualizar-patrimonio"] = ["controller" => "LayoutController", "action" => "atualizarPatrimonio"];
$routes["/deletar-patrimonio"] = ["controller" => "LayoutController", "action" => "deletarPatrimonio"];

//Usuário
$routes["/cadastrar-usuario"] = ["controller" => "LayoutController", "action" => "cadastrarUsuario"];
$routes["/atualizar-usuario"] = ["controller" => "LayoutController", "action" => "atualizarUsuario"];
$routes["/deletar-usuario"] = ["controller" => "LayoutController", "action" => "deletarUsuario"];


//Ações patrimônio 
$routes["/api/cadastraPatrimonio"] = ["controller" => "PatrimonioController", "action" => "cadastraPatrimonio"];
$routes["/api/atualizaPatrimonio"] = ["controller" => "PatrimonioController", "action" => "atualizaPatrimonio"];
$routes["/api/listaPatrimonios"] = ["controller" => "PatrimonioController", "action" => "listarPatrimonios"];

//Ações usuário 
$routes["/api/cadastraUsuario"] = ["controller" => "UsuarioController", "action" => "cadastraUsuario"];
$routes["/api/atualizaUsuario"] = ["controller" => "UsuarioController", "action" => "atualizaUsuario"];