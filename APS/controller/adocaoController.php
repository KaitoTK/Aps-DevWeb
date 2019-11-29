<?php

    include "model/adocao.php";

    class adocaoController{
        private $apiUrl; 

        function __construct() {
            $this->apiUrl = system::apiUrl();
        }

        function adota_doggo(){
            $adocao = new Adocao();
            $adocao->setDoggo($_POST['Doggo']);
            $adocao->setDono($_POST['Dono']);
            
            $adocaoDAO = new AdocaoDAO();
            
            $adocaoDAO->adotar_doggo($adocao);
            
            echo var_dump($_POST['id_doggo']);
            $doggoDAO = new DoggoDAO();
            $doggoDAO->adota_doggo($_POST['id_doggo']);

            header("location: /doggos_felizes");
        }

    }

?>