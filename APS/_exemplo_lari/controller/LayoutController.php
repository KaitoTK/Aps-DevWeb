<?php

class LayoutController {
    private $apiUrl; 
    private $content;
    private $msg;

    function __construct() {
        session_start();

        $this->apiUrl = SystemConfig::apiUrl();

        if (isset($_GET['msg'])) {
            $this->msg = $_GET['msg'];
        }
    } 

    function index() {
        SystemConfig::isLogged();

        $listaPatrimonios = new PatrimonioDAO();
        $lista = $listaPatrimonios->listarPatrimonios();
        $this->content = "view/html/listaPatrimonio.phtml";
        include "view/html/layout.phtml";
    }

    function login() {
        include "view/html/login.phtml";
    }

    function fazerLogin() {
        $login = $_POST['inputLogin'];
        $senha = $_POST['inputPassword'];

        $fazerLogin = new UsuarioDAO();
        $retorno = $fazerLogin->retornaUsuarioPorLoginESenha($login, $senha);

        if ($retorno == true) {
            $_SESSION['logado'] = $login;
            header("location: ".$this->apiUrl."/home");
        } else {
            header("location: ".$this->apiUrl."/login?msg=erro-login");
        }
    }

    function sair() {
        session_destroy();
        header("location: ".$this->apiUrl."/login");
    }

    //Metodos de usuario

    function listarUsuarios() {
        SystemConfig::isLogged();

        $listarUsuarios = new UsuarioDAO();
        $lista = $listarUsuarios->listarUsuarios();
        $this->content = "view/html/listaUsuario.phtml";
        include "view/html/layout.phtml";
    }

    function cadastrarUsuario() {
        SystemConfig::isLogged();

        $this->content = "view/html/cadastroUsuario.phtml";
        include "view/html/layout.phtml";
    }

    function atualizarUsuario() {
        SystemConfig::isLogged();

        $idUsuario = $_GET['id'];
        $retornaUsuario = new UsuarioDAO();
        $usuario = $retornaUsuario->retornaUsuario($idUsuario);
        $this->content = "view/html/atualizaUsuario.phtml";
        include "view/html/layout.phtml";
    }

    function deletarUsuario() {
        SystemConfig::isLogged();

        $id = $_GET['id'];
        
        $deletaUsuario = new UsuarioDAO();
        $retorno = $deletaUsuario->deletaUsuario($id);

        if ($retorno == true) {
            header("location: ".$this->apiUrl."/usuarios?msg=sucesso-excluir-usuario");
        } else {
            header("location: ".$this->apiUrl."/usuarios?msg=erro-excluir-usuario");
        }
    }

    //Metodos de patrimonio

    function cadastrarPatrimonio() {
        SystemConfig::isLogged();

        $this->content = "view/html/cadastroPatrimonio.phtml";
        include "view/html/layout.phtml";
    }

    function atualizarPatrimonio() {
        SystemConfig::isLogged();

        $idPatrimonio = $_GET['id'];
        $retornaPatrimonio = new PatrimonioDAO();
        $patrimonio = $retornaPatrimonio->retornaPatrimonio($idPatrimonio);
        $this->content = "view/html/atualizaPatrimonio.phtml";
        include "view/html/layout.phtml";
    }

    function deletarPatrimonio() {
        SystemConfig::isLogged();

        $id = $_GET['id'];
        
        $deletaPatrimonio = new PatrimonioDAO();
        $retorno = $deletaPatrimonio->deletaPatrimonio($id);

        if ($retorno == true) {
            header("location: ".$this->apiUrl."/home?msg=sucesso-excluir");
        } else {
            header("location: ".$this->apiUrl."/home?msg=erro-excluir");
        }
    }
   
}