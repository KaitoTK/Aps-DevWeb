<?php

    include "./model/DoggoDAO.php";

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
    }

?>