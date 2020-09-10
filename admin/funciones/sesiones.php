<?php 
    function autenticar_sesion(){
        if(!verificar_sesion()) {
            header("Location: login.php");
            exit();
        }
    }

    function verificar_sesion() {
        return isset($_SESSION["usuario"]);
    }

    session_start();
    autenticar_sesion();

?>