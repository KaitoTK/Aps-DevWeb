<?php 

class UsuarioDAO{

    function cadastraUsuario($usuario){
        try{
            $stmt = DbConfig::conn()->prepare("INSERT INTO usuario (nome, email, login, senha) VALUES (:nome, :email, :login, :senha)");
            $stmt->execute(array('nome' => $usuario->getNome(), 'email' => $usuario->getEmail(), 'login' => $usuario->getLogin(), 'senha' => $usuario->getSenha()));
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    function listarUsuarios(){
        try{
            $stmt = DbConfig::conn()->prepare("SELECT * FROM usuario");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }catch(PDOException $e){
            return [];
        }
    }

    function retornaUsuario($idUsuario){
        try{
            $stmt = DbConfig::conn()->prepare("SELECT id, nome, email, login, senha FROM usuario WHERE id = :idUsuario");
            $stmt->execute(array('idUsuario' => $idUsuario));
            
            $usuario = new Usuario();
            $usuario = $stmt->fetch(PDO::FETCH_OBJ);
            return $usuario;
        }catch(PDOException $e){
            return false;
        }
    }

    function atualizaUsuario($usuario, $idUsuario){
        try{
            $stmt = DbConfig::conn()->prepare("UPDATE usuario SET nome = :nome, email = :email, login = :login, senha = :senha WHERE id = :idUsuario");
            $stmt->execute(array('idUsuario' => $idUsuario, 'nome' => $usuario->getNome(), 'email' => $usuario->getEmail(), 'login' => $usuario->getLogin(), 'senha' => $usuario->getSenha()));
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    function deletaUsuario($id){
        try{
            $stmt = DbConfig::conn()->prepare("DELETE FROM usuario WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    function retornaUsuarioPorLoginESenha($login, $senha){
        try{
            $stmt = DbConfig::conn()->prepare("SELECT id, nome, email, login, senha FROM usuario WHERE login = :login AND senha = :senha");
            $stmt->bindParam(':login', $login);
            $stmt->bindParam(':senha', $senha);
            $stmt->execute();
            
            $usuario = new Usuario();
            $usuario = $stmt->fetch(PDO::FETCH_OBJ);

            $retorno = false;
            $idUsuario = $usuario->id;

            if(is_null($idUsuario) == true || empty($idUsuario) == true){
                $retorno = false;
            } else{
                $retorno = true;
            }
            return $retorno;
        }catch(PDOException $e){
            return false;
        }
    }

}

?>