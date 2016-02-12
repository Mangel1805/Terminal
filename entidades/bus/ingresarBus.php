<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap - Prebuilt Layout</title>

<!-- Bootstrap -->
<link href="../../static/css/bootstrap.css" rel="stylesheet">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 

</head>
<body>
<?php
if (isset($_POST['enviar'])) {
$ndisco = $_POST['ndisco'];
$asiento = $_POST['asiento'];
$placa = $_POST['placa'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];


require('../../conexion.php');

$con = Conectar();
$sql = 'INSERT INTO bus (bus_num_disco,bus_asientos,bus_placa,bus_marca,bus_modelo)VALUES (:ndisco, :asiento, :placa,:marca,:modelo)';

$q = $con->prepare($sql);

$q->execute(array(':ndisco'=>$ndisco,':asiento'=>$asiento, ':placa'=>$placa,':marca'=>$marca,':modelo'=>$modelo));
header("location:http://localhost/terminal/entidades/bus/listarBus.php");
}
?>
<div class="container-fluid">


  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h3 class="text-center">Nuevo Bus</h3>
    </div>

  </div>
 <hr>

</div>
<div class="container">
  <div class="row text-center">
    <div class="col-md-6 col-md-offset-3 col-lg-offset-0 col-lg-12">
    
    </div>
   

    <form id="form1" name="form1" method="post" >

	  <label>Numero de Disco</label>
    <input type="text" name="ndisco" id="ndisco" value=""><br>
    <label>Asiento</label>
    <input type="number" name="asiento" id="asiento" value=""><br>
    <label>Placa</label>
    <input type="text" name="placa"id="placa" value=""><br>
    <label>Marca</label>
    <input type="text" name="marca"id="marca" value=""><br>
    <label>Modelo</label>
	  <input type="text" name="modelo"id="modelo" value=""><br>
    
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
