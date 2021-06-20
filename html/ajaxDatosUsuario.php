<?php
    if( isset($_GET) ) {
        session_start();
        require '../assets/connections/database.php';
        
        if(isset($_SESSION['correo'])){
            $correo = $_SESSION['correo'];
        }
        else{
            $correo = NULL;
        }

        echo $correo;

    } else {
        die("Solicitud no válida.");
    }
?>