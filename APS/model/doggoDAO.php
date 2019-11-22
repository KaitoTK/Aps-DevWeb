<?php

class DoggoDAO{

    function lista_doggos(){
        try{
            $stmt = db::conn()->prepare("SELECT * FROM doggo");
            $stmt -> execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }catch(PDOException $e){
            return [];
        }
    }

    function inserir_doggo($doggo){
        try{
            $stmt = db::conn()->prepare('INSERT INTO doggo (Nome, Raca, Idade, Descricao) VALUES (:nome, :raca, :idade, :descricao)');
            $stmt->execute(array(
                'nome' => $doggo->getNome(), 
                'raca' => $doggo->getRaca(), 
                'idade' => $doggo->getIdade(), 
                'descricao' => $doggo->getDescricao()
            ));

        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function atualiza_doggo($doggo, $id_doggo){
        try{
            $stmt = db::conn()->prepare('UPDATE doggo SET Nome = :nome, Raca = :raca, Idade = :idade, Descricao = :descricao WHERE ID=:id_doggo');
            $stmt->execute(array(
                'nome' => $doggo->getNome(),
                'raca' => $doggo->getRaca(), 
                'idade' => $doggo->getIdade(), 
                'descricao' => $doggo->getDescricao(), 
                'id_doggo' => $id_doggo
            ));

        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function adota_doggo($id_doggo){
        try{
            $stmt = db::conn()->prepare("DELETE FROM doggo WHERE id = :id_doggo");
            $stmt->execute(array(':id_doggo' => $id_doggo));
            
        }catch(PDOException $e){
            return false;
        }
    }

    function pega_doggo($id_doggo){
        try{
            $stmt = db::conn()->prepare("SELECT * FROM doggo WHERE id = :id_doggo");
            $stmt->execute(array('id_doggo' => $id_doggo));
            
            $doggo = new Doggo();
            $doggo = $stmt->fetch(PDO::FETCH_OBJ);
            return $doggo;
        }catch(PDOException $e){
            return false;
        }
    }

}
?>
