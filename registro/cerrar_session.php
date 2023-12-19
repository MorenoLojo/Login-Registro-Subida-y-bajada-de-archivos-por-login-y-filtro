<?php
    $varsesion = $_SESSION['usuario'];

    if($varsesion == null || $varsesion = ''){
        echo 'Inicia sesion';
        die();
        session_destroy();
    }else{
        
        
    }
?>