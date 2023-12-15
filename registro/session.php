
<?php
    session_start();
    $usuario=$_SESSION['usuario'];
    $estado = false;
    if(isset($usuario)){
        $estado = true;
        echo($_SESSION['usuario']);
    }else{
        echo "<script language='JavaScript'>
                alert('Se ha cerrado session...redirigiendo ');
                location.assign('./login.php');
                </script>";
    }
?>