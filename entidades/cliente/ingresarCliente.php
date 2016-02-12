<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>cedula|Cliente</title>

<!-- Bootstrap -->
<link href="../../static/css/bootstrap.css" rel="stylesheet">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 

</head>
<body>
<?php
if (isset($_POST['enviar'])) {
$cedula = $_POST['cedula'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];


require('../../conexion.php');

$con = Conectar();
$sql = 'INSERT INTO cliente (cli_cedula,cli_nombre,cli_apellido,cli_telefono,cli_direccion)VALUES (:cedula, :nombre, :apellido,:telefono,:direccion)';

$q = $con->prepare($sql);

$q->execute(array(':cedula'=>$cedula,':nombre'=>$nombre, ':apellido'=>$apellido, ':telefono'=>$telefono, ':direccion'=>$direccion));
header("location:http://localhost/terminal/entidades/cliente/listarCliente.php");
}
?>
<div class="container-fluid">


  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h3 class="text-center">Nuevo Cliente</h3>
    </div>

  </div>
 <hr>

</div>
<div class="container">
  <div class="row text-center">
    <div class="col-md-6 col-md-offset-3 col-lg-offset-0 col-lg-12">
    
    </div>
   

    <form id="form1" name="form1" method="post" >

	  <label>cedula</label>
    <input type="text" name="cedula" id="cedula" value=""><br>
    <label>nombre</label>
    <input type="text" name="nombre" id="nombre" value=""><br>
    <label>apellido</label>
    <input type="text" name="apellido"id="apellido" value=""><br>
    <label>telefono</label>
    <input type="text" name="telefono"id="telefono" value=""><br>
    <label>direccion</label>
    <input type="text" name="direccion"id="direccion" value=""><br>
    
<br>
   <input type="submit" name="enviar">
    
   

  
    </form>

  </div>
  
  
  
  
  
  
  <hr>
  
  </div>
  <hr>
 
  
  <hr>
  <div class="row">
    <div class="text-center col-md-6 col-md-offset-3">
      <h4>Footer </h4>
      <p>Copyright &copy; 2015 &middot; All Rights Reserved &middot; <a href="http://yourwebsite.com/" >My Website</a></p>
    </div>
  </div>
  
  
  <hr>
</div>

</body>
<script src="../../static/js/jquery.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="../../static/js/bootstrap.js"></script>
</html>
