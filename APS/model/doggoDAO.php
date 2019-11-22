<?php

class DoggoDAO{

    function inserir_doggo($nome, $raca, $idade, $desc){
        try{
            $stmt = db::conn()->prepare('INSERT INTO doggo (Nome, Raca, Idade, Descricao) VALUES (:nome, :raca, :idade, :descricao)');
            $stmt->execute(array(':nome' => "$nome", ':raca' => "$raca", ':idade' => "$idade", ':descricao' => "$desc"));

        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function lista_doggos(){
        try{
            $stmt = db::conn()->prepare("SELECT * FROM doggo");
            $stmt -> execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }catch(PDOException $e){
            return [];
        }
    }

    function update_doggo($nome, $raca, $idade, $desc, $id){
        $conn = new PDO('mysql:host=localhost;dbname=doggo', 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare('UPDATE TABLE doggo SET Nome = :nome, Raca = :raca, Idade = :idade, Descricao = :descricao) WHERE ID=:id');
        $stmt->execute(array(':nome' => "$nome", ':raca' => "$raca", ':idade' => "$idade", ':descricao' => "$desc", ':id' => "$id"));
        
    }

}
?>