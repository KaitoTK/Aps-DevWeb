<?php
    class system {
        public static function apiUrl(){
            return "http://localhost:4000".system::path();
        }

        public static function path(){
            return "/adote_um_doggo";
        }

        // public static function isLogged() {
        //     if(!isset($_SESSION["auth"])) {
        //         header("location: ".system::apiUrl()."/login")
        //     }
        // }
    }
?>