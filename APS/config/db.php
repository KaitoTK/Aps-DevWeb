<?php
    class db{
        public static function conn(){
            $conn = new PDO("mysql:host=localhost;dbname=adote_um_doggo", "root", "");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        }
    }
?>