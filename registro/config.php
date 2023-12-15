<?php
# echo “Conexion bd”;
    $servidor="localhost";
    $usuario="root";
    $clave="";
    $bd="registro";
# echo “Le pasamos a la bd los datos necesarios para acceder”;
    $conexion = mysqli_connect($servidor, $usuario, $clave , $bd);
# echo “Control de errores”;
    if(!$conexion){
      echo "Error en la conexion del servidor";
      }
?>