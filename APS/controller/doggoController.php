<?php

    include "model/doggo.php"
    include "model/doggoDAO.php"

    class doggoController{
        private $apiUrl; 
        function __construct() {
            $this->apiUrl = sys::apiUrl();
        } 

        function inserir_doggo(){
            $doggo = new doggo();
            $doggo->setNome($_POST['Nome']);
            $doggo->setIdade($_POST['Idade']);
            $doggo->setRaca($_POST['Raca']);
            $doggo->setDescricao($_POST['Descricao']);
            $inserir_doggo = new doggoDAO();
            $retorno = $inserir_doggo->inserir_doggo($doggo);
        }

        function atualiza_doggo(){
            $doggo = new doggo();
            $doggo->setNome($_POST['Nome']);
            $doggo->setIdade($_POST['Idade']);
            $doggo->setRaca($_POST['Raca']);
            $doggo->setDescricao($_POST['Descricao']);
            $iddoggo = $_POST['iddoggo'];
            $atualiza_doggo = new doggoDAO();
            $retorno = $atualiza_doggo->atualiza_doggo($doggo, $iddoggo);
        }
    }   

?>