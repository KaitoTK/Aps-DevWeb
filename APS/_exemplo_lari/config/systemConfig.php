<?php

class SystemConfig {
    public static function apiUrl(){
        return "http://localhost:8080".SystemConfig::path();
    }

    public static function path(){
        return "/gerenciador-de-patrimonio";
    }

    public static function isLogged() {
        if (!isset($_SESSION['logado'])) {
            header("location: ".SystemConfig::apiUrl()."/login");
        }
    }
}