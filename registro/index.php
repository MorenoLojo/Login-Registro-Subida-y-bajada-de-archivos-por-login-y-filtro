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
  <link rel="stylesheet" href="css/style.css">
  <title>Formulario Registro</title>
</head>
<body>
	<img src="logo.jpg" class="img" alt="">
  <form action="#" class="formulario" id="formulario" name="formulario" method="POST">
    <section class="form-register">
     <h4>Formulario Registro</h4>
	    <input class="controls" type="text" name="empresa" id="empresa" placeholder="Ingrese su Empresa">
	    <input class="controls" type="text" name="puesto" id="puesto" placeholder="Ingrese su Puesto">
	    <input class="controls" type="number" name="telefono" id="telefono" placeholder="Ingrese su Telefono">
      <input class="controls" type="text" name="usuario" id="usuario" placeholder="Ingrese su Usuario">
      <input class="controls" type="password" name="password" id="password" placeholder="Ingrese su Contraseña">
      <input class="botons" type="submit" name="registrarse" value="Registrar">
      <p><a href="login.php">¿Ya tengo Cuenta?</a></p>
     </section>
  </form>
</body>
</html>

<?php
# echo “Envio de datos a bd”;
    if(isset($_POST['registrarse'])){
      $id=rand(1,99);
      $empresa= $_POST["empresa"];
      $puesto=$_POST["puesto"];
      $telefono=$_POST["telefono"];
      $usuario= $_POST["usuario"];
      $password= $_POST["password"];
# echo “Pasamos los datos con el posta para despues insertar en la bd y registrarlos”;
      $insertarDatos = "INSERT INTO registro VALUES('$id',
                                                      '$empresa',
                                                      '$puesto',
                                                      '$telefono',
                                                      '$usuario',
                                                      '$password')";
# echo “Ejecutamos el post para hacer la inserccion”;
      $ejecutarInsertar = mysqli_query($conexion,$insertarDatos);
      # echo “Control de errores”;
      if(!$ejecutarInsertar){
        echo"Error al hacer la insercion.";
      }
    }
    # echo “John”;
?>
