<?php

class AdocaoDAO{

    function adotar_doggo($adocao){
        try{
            $stmt = db::conn()->prepare("INSERT INTO adocao (Dono, Doggo) VALUES (:dono, :doggo)");
            $stmt->execute(array('doggo' =>  $adocao->getDoggo(), 'dono' => $adocao->getDono()));

        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }    
    
    function lista_doggos_felizes(){
        try{
            $stmt = db::conn()->prepare("SELECT * FROM adocao");
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }catch(PDOException $e){
            return [];
        }
    }
}

?>