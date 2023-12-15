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
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/login.css">
  <link rel="stylesheet" href="css/style.css">
  <title>Formulario Registro</title>
</head>
<body>
  <link href="https://fonts.googleapis.com/css?family=Russo+One" rel="stylesheet">
  <img src="logo-maps.jpg" class="img" alt="">
  <form method="post" action="login.php">
        <svg viewBox="0 0 1320 300">
	        <text x="50%" y="50%" dy=".35em" text-anchor="middle">
	        	CarinsaGroup
	        </text>
        </svg>	

    <section class="form-register">
        <input class="controls" type="text" name="usuario" id="usuario" placeholder="Ingrese su Usuario">
        <input class="controls" type="password" name="password" id="password" placeholder="Ingrese su Contraseña">
        <input class="botons" type="submit" name="registrarse" value="IniciaSesion" onclick="">
      <p><a href="index.php">No tengo cuenta?
</a></p>
    </section>
    <?php
# echo “Pasamos con el post el usuario y contraseña”;
 $usuario= $_POST["usuario"];
 $password= $_POST["password"];
# echo “Para hacer aqui una busqueda en la base de datos”;
 $query = mysqli_query($conexion,"SELECT * FROM registro WHERE usuario = '".$usuario."' and password = '".$password."'");
 $info = mysqli_num_rows($query);
 # echo “Si el usario coincide te da la bienvenida si no generamos una excepcion”;
  if($info == 1){
      header("Location: pagina.php");
      session_start();
      $_SESSION['usuario']=$usuario;
  }else{
    echo '<script type="text/javascript">
    window.onload = function () { alert("Introduce usuario o registrate si no tienes"); } 
    </script>'; 
  }
?>
  </form>
</body>
</html>
