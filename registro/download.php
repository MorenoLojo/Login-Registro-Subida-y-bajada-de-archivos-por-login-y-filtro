<?php
include "config.php";

$id = $_GET['id'];
$sql= "SELECT * FROM documento WHERE id= '$id'";
$resultado = mysqli_query($conexion, $sql);

if(mysqli_num_rows($resultado)== 1){
    $fila = mysqli_fetch_assoc($resultado);
    $archivo = $fila['archivo'];
    $ruta_archivo = "files/" .$archivo;

    if(file_exists($ruta_archivo)){
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename='. $archivo. '"');
        readfile($ruta_archivo);
    }else{
        echo "Archivo no existe";
    }
}else{
    echo "No se encontro el archivo en la bd";
}



?>