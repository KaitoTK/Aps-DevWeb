<?php

class PatrimonioController{
    private $apiUrl; 

    function __construct() {
        $this->apiUrl = SystemConfig::apiUrl();
    } 

    function cadastraPatrimonio(){
        SystemConfig::isLogged();

        $patrimonio = new Patrimonio();
        $patrimonio->setDescricao($_POST['descricaoPatrimonio']);
        $patrimonio->setDataDeInclusao($_POST['dataDeInclusao']);
        $patrimonio->setStatus($_POST['status']);

        $patrimonioCadastro = new PatrimonioDAO();
        $retorno = $patrimonioCadastro->cadastraPatrimonio($patrimonio);

        if ($retorno == true) {
            header("location: ".$this->apiUrl."/home?msg=sucesso-cadastrar");
        } else {
            header("location: ".$this->apiUrl."/home?msg=erro-cadastrar");
        }
    }

    function atualizaPatrimonio(){
        SystemConfig::isLogged();

        $patrimonio = new Patrimonio();
        $patrimonio->setDescricao($_POST['descricaoPatrimonio']);
        $patrimonio->setStatus($_POST['status']);
        $idPatrimonio = $_POST['idPatrimonio'];

        $atualizaPatrimonio = new PatrimonioDAO();
        $retorno = $atualizaPatrimonio->atualizaPatrimonio($patrimonio, $idPatrimonio);

        if ($retorno == true) {
            header("location: ".$this->apiUrl."/home?msg=sucesso-atualizar");
        } else {
            header("location: ".$this->apiUrl."/home?msg=erro-atualizar");
        }
    }   


}

