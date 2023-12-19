<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filtro</title>
    
    <link rel="stylesheet" href="./css/paginaarchivos/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Mr+Dafoe" rel="stylesheet">
    

    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</head>
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
<body>
<div class="waveWrapper waveAnimation">

<div class="waveWrapperInner bgBottom">
    <div class="wave waveBottom" style="background-image: url('http://front-end-noobs.com/jecko/img/wave-bot.png')"></div>
  
 

 
 

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

<form action="" method="GET">
              <input type="text" name="busqueda" placeholder="Busca la descripcion del archivo">
              <input type="submit" name="enviar" value="Buscar">
 </form>

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
 <?php

if(isset($_GET['enviar'])){
    
  include ('config.php');
  $busqueda = $_GET['busqueda'];

  $request = $conexion->query("SELECT * FROM documento WHERE descripcion LIKE '%$busqueda'");

  while ($row = $request->fetch_array()){
?>
 <tr>
                            <td><?php echo $row['id'] ;?></td>
                            <td><?php echo $row['nombre'] ;?></td>
                            <td><?php echo $row['descripcion'] ;?></td>
                            <td><?php echo $row['archivo'] ;?></td>
                                <td>
                                <a href="./files/download.php?id= <?php echo $row['id'] ;?>" class="btn btn-primary">
                                  <i class="fas fa-download"></i></a>
                                </td>
</tr>

</div></div></div></div>
<?php } ; ?>
<?php } ; ?>
</body>
</html>
