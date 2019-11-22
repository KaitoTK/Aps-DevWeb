<?php 

class UsuarioController{

    private $apiUrl; 

    function __construct() {
        $this->apiUrl = SystemConfig::apiUrl();
    } 

    function cadastraUsuario(){
        SystemConfig::isLogged();

        $usuario = new Usuario();
        $usuario->setNome($_POST['nomeUsuario']);
        $usuario->setEmail($_POST['emailUsuario']);
        $usuario->setLogin($_POST['loginUsuario']);
        $usuario->setSenha($_POST['senhaUsuario']);

        $usuarioCadastro = new UsuarioDAO();
        $retorno = $usuarioCadastro->cadastraUsuario($usuario);

        if ($retorno == true) {
            header("location: ".$this->apiUrl."/usuarios?msg=sucesso-cadastrar-usuario");
        } else {
            header("location: ".$this->apiUrl."/usuarios?msg=erro-cadastrar-usuario");
        }
    }

    function atualizaUsuario(){
        SystemConfig::isLogged();

        $usuario = new Usuario();
        $usuario->setNome($_POST['nomeUsuario']);
        $usuario->setEmail($_POST['emailUsuario']);
        $usuario->setLogin($_POST['loginUsuario']);
        $usuario->setSenha($_POST['senhaUsuario']);
        $idUsuario = $_POST['idUsuario'];

        $atualizaUsuario = new UsuarioDAO();
        $retorno = $atualizaUsuario->atualizaUsuario($usuario, $idUsuario);

        if ($retorno == true) {
            header("location: ".$this->apiUrl."/usuarios?msg=sucesso-atualizar-usuario");
        } else {
            header("location: ".$this->apiUrl."/usuarios?msg=erro-atualizar-usuario");
        }
    } 

}
?>