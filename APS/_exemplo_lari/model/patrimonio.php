<?php
class Patrimonio{
    
    private $id;
    private $descricao;
    private $dataDeInclusao;
    private $status;

    public function getId(){
        return $this->id;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }

    public function getDataDeInclusao(){
        return $this->dataDeInclusao;
    }

    public function setDataDeInclusao($dataDeInclusao){
        $this->dataDeInclusao = $dataDeInclusao;
    }

    public function getStatus(){
        return $this->status;
    }

    public function setStatus($status){
        $this->status = $status;
    }
    
}
?>