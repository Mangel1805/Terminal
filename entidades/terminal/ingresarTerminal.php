<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Termnal|Nuevo</title>

<!-- Bootstrap -->
<link href="../../static/css/bootstrap.css" rel="stylesheet">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 

</head>
<body>
<?php
if (isset($_POST['enviar'])) {
$descripcion = $_POST['descripcion'];



require('../../conexion.php');

$con = Conectar();
$sql = 'INSERT INTO terminal (ter_descripcion)VALUES (:descripcion)';

$q = $con->prepare($sql);

$q->execute(array(':descripcion'=>$descripcion));
header("location:http://localhost/terminal/entidades/terminal/listarTerminal.php");
}
?>
<div class="container-fluid">


  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h3 class="text-center">Nueva Terminal</h3>
    </div>

  </div>
 <hr>

</div>
<div class="container">
  <div class="row text-center">
    <div class="col-md-6 col-md-offset-3 col-lg-offset-0 col-lg-12">
    
    </div>
   

    <form id="form1" name="form1" method="post" >

	  <label>descripcion</label>
    <input type="text" name="descripcion" id="descripcion" value=""><br>

    
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
