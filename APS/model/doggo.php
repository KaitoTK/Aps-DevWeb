<?php

class Doggo{
    
    public $id;
    public $nome;
    public $raca;
    public $idade;
    public $descricao;
    
    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getRaca() {
        return $this->raca;
    }

    public function setRaca($raca){
        $this->raca = $raca;
    }

    public function getIdade() {
        return $this->idade;
    }

    public function setIdade($idade){
        $this->idade = $idade;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }

}

?>
