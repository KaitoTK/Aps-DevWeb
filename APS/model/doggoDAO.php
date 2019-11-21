<?php

class DoggoDAO{

    function insert($nome, $raca, $idade, $desc){
        try{
            $conn = new PDO('mysql:host=localhost;dbname=doggo', 'root', '');
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare('INSERT INTO doggo (Nome, Raca, Idade, Descricao) VALUES (:nome, :raca, :idade, :descricao)');
            $stmt->execute(array(':nome' => "$nome", ':raca' => "$raca", ':idade' => "$idade", ':descricao' => "$desc"));

        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function list(){
            // $conn = new PDO('mysql:host=localhost;dbname=doggo', 'root', '');
            // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // $consulta = $conn->query('SELECT * FROM doggo');

            echo '<section class="page-section clearfix">
                <div class="container">
                    <div class="intro">
                        <img class="intro-img img-fluid mb-3 mb-lg-0 rounded" src="img/dog1.jpg" alt="">
                        <div class="intro-text left-0 text-center bg-faded p-5 rounded">
                            <h2 class="section-heading mb-4">
                                <span class="section-heading-upper">Fabinho</span>
                                <span class="section-heading-lower">Alegrão</span>
                            </h2>
                            <p class="mb-3"> Esse doguera é legal</p>
                            <div class="intro-button mx-auto">
                                <a class="btn btn-primary btn-xl" href="#">Me Adote</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>';
    }

    function update($nome, $raca, $idade, $desc, $id){
        $conn = new PDO('mysql:host=localhost;dbname=doggo', 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare('UPDATE TABLE doggo SET Nome = :nome, RAca = :raca, Idade = :idade, Descricao = :descricao) WHERE ID=:id');
        $stmt->execute(array(':nome' => "$nome", ':raca' => "$raca", ':idade' => "$idade", ':descricao' => "$desc", ':id' => "$id"));
        
    }

}
?>