<?php

    include "model/doggo.php";

    class doggoController{
        private $apiUrl; 

        function __construct() {
            $this->apiUrl = system::apiUrl();
        }

        function inserir_doggo(){
            $doggo = new Doggo();
            $doggo->setNome($_POST['Nome']);
            $doggo->setIdade($_POST['Idade']);
            $doggo->setRaca($_POST['Raca']);
            $doggo->setDescricao($_POST['Descricao']);
            
            $doggoDAO = new DoggoDAO();
            $doggoDAO->inserir_doggo($doggo);

            header("location: /home");

        }

        function atualiza_doggo(){
            echo var_dump($_POST);
            $doggo = new Doggo();
            $doggo->setNome($_POST['Nome']);
            $doggo->setIdade($_POST['Idade']);
            $doggo->setRaca($_POST['Raca']);
            $doggo->setDescricao($_POST['Descricao']);
            $id_doggo = $_POST['id_doggo'];
            $atualiza_doggo = new DoggoDAO();
            $atualiza_doggo->atualiza_doggo($doggo, $id_doggo);

            header("location: ".$this->apiUrl."/goodest_boi?id_doggo=".$id_doggo);

        }
    }

?>