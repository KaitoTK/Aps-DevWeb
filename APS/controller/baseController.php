<?php

    include "./model/DoggoDAO.php";
    include "./model/AdocaoDAO.php";

    class baseController{
        private $apiUrl;
        private $content;
        private $message;

        function __construct(){
            session_start();

            $this->apiUrl = system::apiUrl();

            if(isset($_GET['message'])){
                $this->message = $_GET['message'];
            }

        }

        function index() {
            $doggo_dao = new DoggoDAO();
            $doggos = $doggo_dao->lista_doggos();
            $this->content = "view/lista_doggos.phtml";
            include "view/base.phtml";
        }

        // DOGGOS

        function inserir_doggo() {
            $this->content = "view/insere_doggo.phtml";
            include "view/base.phtml";
        }

        function atualizar_doggo() {
            $id_doggo = $_GET['id_doggo'];

            $doggo = new DoggoDAO();
            $good_boi = $doggo->pega_doggo($id_doggo);
            
            $this->content = "view/atualiza_doggo.phtml";
            include "view/base.phtml";
        }  

        function goodest_boi(){
            $id_doggo = $_GET['id_doggo'];

            $doggo = new DoggoDAO();
            $good_boi = $doggo->pega_doggo($id_doggo);

            $this->content = "view/goodest_boi.phtml";
            include "view/base.phtml";

        }

        // ADOCAO

        function adotar_doggo() {
            $id_doggo = $_GET['id_doggo'];

            $doggo = new DoggoDAO();
            $good_boi = $doggo->pega_doggo($id_doggo);

            $this->content = "view/adota_doggo.phtml";
            include "view/base.phtml";
        }  

        function listar_doggos_felizes() {
            $adocaoDAO = new AdocaoDAO();
            $doggos_felizes = $adocaoDAO->lista_doggos_felizes();
            $this->content = "view/doggos_felizes.phtml";
            include "view/base.phtml";
        }  
    }

?>