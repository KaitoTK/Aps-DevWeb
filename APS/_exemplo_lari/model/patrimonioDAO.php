<?php

class PatrimonioDAO{

    function cadastraPatrimonio($patrimonio){
        try{
            $stmt = DbConfig::conn()->prepare("INSERT INTO patrimonio (descricao, dataDeInclusao, status) VALUES (:descricao, :dataDeInclusao, :status)");
            $stmt->execute(array('descricao' => $patrimonio->getDescricao(), 'dataDeInclusao' => $patrimonio->getDataDeInclusao(), 'status' => $patrimonio->getStatus()));
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    function deletaPatrimonio($id){
        try{
            $stmt = DbConfig::conn()->prepare("DELETE FROM patrimonio WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    function listarPatrimonios(){
        try{
            $stmt = DbConfig::conn()->prepare("SELECT * FROM patrimonio");
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }catch(PDOException $e){
            return [];
        }
    }

    function atualizaPatrimonio($patrimonio, $idPatrimonio){
        try{
            $stmt = DbConfig::conn()->prepare("UPDATE patrimonio SET descricao = :descricao, status = :status WHERE id = :idPatrimonio");
            $stmt->execute(array('idPatrimonio' => $idPatrimonio, 'descricao' => $patrimonio->getDescricao(), 'status' => $patrimonio->getStatus()));
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    function retornaPatrimonio($idPatrimonio){
        try{
            $stmt = DbConfig::conn()->prepare("SELECT id, descricao, dataDeInclusao, status FROM patrimonio WHERE id = :idPatrimonio");
            $stmt->execute(array('idPatrimonio' => $idPatrimonio));
            
            $patrimonio = new Patrimonio();
            $patrimonio = $stmt->fetch(PDO::FETCH_OBJ);
            return $patrimonio;
        }catch(PDOException $e){
            return false;
        }
    }
}
?>