<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>archivos</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Mr+Dafoe" rel="stylesheet">
    

    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
<style>
* {
  box-sizing: border-box;
}



.header {
  padding: 30px;
  text-align: center;
  
}

.header h1 {
  font-size: 50px;
}


.topnav {
  overflow: hidden;
  background-color: #333;
}

body {
  font-family: Arial;
  padding: 10px;
  background-image: url(logo-maps.jpg);
  background-size: 1650px 1600px;
}
.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}


.topnav a:hover {
  background-color: #ddd;
  color: black;
}


.leftcolumn {   
  float: left;
  width: 75%;
}


.rightcolumn {
  float: left;
  width: 25%;
  background-color: #f1f1f1;
  padding-left: 20px;
}


.img {
  background-color:#E4E7EC   ;
  width: 100%;
  padding: 20px;
}

.card {
  background-color: white;
  padding: 20px;
  margin-top: 20px;
}


.row:after {
  content: "";
  display: table;
  clear: both;
}


.footer {
  padding: 20px;
  text-align: center;
  background: #ddd;
  margin-top: 20px;
}



@media screen and (max-width: 800px) {
  .leftcolumn, .rightcolumn {   
    width: 100%;
    padding: 0;
  }
}

@media screen and (max-width: 400px) {
  .topnav a {
    float: none;
    width: 100%;
  }
}
.shadow{
  font-family:Mr Dafoe, sans-serif;
  font-size:3em;
  text-align:center;
  text-shadow: 0 -1px 0 #2BD31A,
    0 6px 8px rgba(0,0,0,.4),
    0 9px 10px rgba(0,0,0,.15),
    0 30px 10px rgba(0,0,0,.18),
    0 15px 10px rgba(0,0,0,.21);
}



</style>
</head>
<body>
<div class="topnav">
  <a href="carinsa.html">Pagina Principal</a>
  <a href="#" style="float:right"><?php $logeado = include_once('session.php') ;?>
  </a>
  <a href="login.php" class="user" style="float: right;" onclick="button" >
                                                         <?php echo"Cerrar session";
                                                         include("cerrar_session.php");
                                                                                      ?>
</a>
                                                        

 
</div>
<div class="container">
<div class="area" >
    </div >
  
        <div class="col-sm-12">
            <div class="shadow">Repositorio Grupo Carinsa Individual</div>
            <br>
            <?php
              require_once "config.php";
              include_once "session.php";
              $usuario=$_SESSION['usuario'];
              $consulta = mysqli_query($conexion, "SELECT * FROM registro WHERE usuario = '$usuario'");
              while ($fila = mysqli_fetch_assoc($consulta)){
            ?>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregar" style="background-color: #0EDFA3;"><a href="./buscador.php" >Buscador para usuario</a></button>
            <?php if ($fila['empresa'] == 'Carinsa' ){ ?>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregar" style="background-color: #0EDFA3;"><a href="./files/agregar.php" >Agregar</a></button>
            <?php
             }
              }
            ?>
            <br>
            <br>
            <br>
            <?php
            require_once 'config.php';
            ?>
            <div class="container">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Usuario</th>
                            <th>Descripcion</th>
                            <th>Archivo</th>
                            <th>Descargar</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php
                       require_once "config.php";
                       include_once "pagina.php";
                       include_once "session.php";
                        $usuario=$_SESSION['usuario'];
                        //*Para solo filtrar por usuario logeado en el = añador '$usuario'  *//
                        //*Si quieres mostrar todo iguala el nombre = nombre 
                       $consulta = mysqli_query($conexion, "SELECT * FROM documento WHERE nombre = '$usuario' ");
                       while ($fila = mysqli_fetch_assoc($consulta)):
                       ?>
                            <tr>
                            <td><?php echo $fila['id'] ;?></td>
                            <td><?php echo $fila['nombre'] ;?></td>
                            <td><?php echo $fila['descripcion'] ;?></td>
                            <td><?php echo $fila['archivo'] ;?></td>
                                <td>
                                <a href="./files/download.php?id= <?php echo $fila['id'] ;?>" class="btn btn-primary">
                                  <i class="fas fa-download"></i></a>
                                </td>
                                <?php endwhile ;?>
                            </tr>
                    </tbody>
                </table>


            </div>
        </div>
    </div>
  </div>
</div>
</body>
</html>