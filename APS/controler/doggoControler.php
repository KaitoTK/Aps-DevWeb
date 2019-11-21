<?php
    include '../model/doggoDAO.php';
    include '../model/doggo.php';

    $doggoDAO = new doggoDAO();

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        $doggoDAO->list();
    }

    if(isset($_POST['cadastrar'])){
        $doggo = new Doggo($_POST['nome'], $_POST['raca'], $_POST['idade'], $_POST['descricao']);
        $doggoDAO->insert($doggo->getNome(), $doggo->getRaca(), $doggo->getIdade(), $doggo->getDescricao());
    }

    if(isset($_POST['btEditar'])){
        $doggoDAO->update($_POST['id'], $_POST['nome'], $_POST['raca'], $_POST['idade'], $_POST['descricao']);
    }

?>