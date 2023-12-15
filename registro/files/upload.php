<?php

// Comprobar si se ha cargado un archivo
if (isset($_FILES['archivo'])) {
    extract($_POST);
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    // Definir la carpeta de destino
    $carpeta_destino = "registro";

    // Obtener el nombre y la extensión del archivo + peso
    $nombre_archivo = basename($_FILES["archivo"]["name"]);
    $extension = strtolower(pathinfo($nombre_archivo, PATHINFO_EXTENSION));
    $fichero = $_FILES['archivo'];
    $tamañofich = $fichero['size'];

    // Validar la extensión del archivo
    if (
        $extension == "pdf" || $extension == "doc" || $extension == "docx" || $extension == "xlsx" ||
        $extension == "txt" || $extension == "jpg" || $extension == "zip" || $extension == "rar"
        || $extension == "png" || $extension == "pptx"
    ) {
        //Excepcion por tamaño 
        if ($tamañofich > 20000) {
            // Mover el archivo a la carpeta de destino
            if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $carpeta_destino . $nombre_archivo)) {
                // Insertar la información del archivo en la base de datos
                include "db.php";
                $sql = "INSERT INTO documento (nombre, descripcion, archivo) 
            VALUES ( '$nombre', '$descripcion','$nombre_archivo')";
                $resultado = mysqli_query($conexion, $sql);
                if ($resultado) {
                    echo "<script language='JavaScript'>
                alert('Archivo Subido');
                location.assign('../login.php');
                </script>";
                } else {
                    echo "<script language='JavaScript'>
                alert('Error al subir el archivo: ');
                location.assign('../pagina.php');
                </script>";
                }
            } else {
                echo "<script language='JavaScript'>
            alert('Error al subir el archivo. ');
            location.assign('../pagina.php');
            </script>";
            }
        } else {
            echo "<script language='JavaScript'>
        alert('El tipo de archivo no esta permitido , contacte con el administrador');
        location.assign('../pagina.php');
        </script>";
        }
    } else {
        echo "<script language='JavaScript'>
        alert('El tipo de archivo es demasiado grande');
        location.assign('../pagina.php');
        </script>";
    }
}
?>


