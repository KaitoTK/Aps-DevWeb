<?php

class DbConfig{
    public static function conn(){
        $conn = new PDO("mysql:host=localhost;dbname=gerenciador-de-patrimonio", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }
}
?>