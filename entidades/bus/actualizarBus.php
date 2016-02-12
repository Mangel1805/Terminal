<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap - Prebuilt Layout</title>

<!-- Bootstrap -->

<link rel="stylesheet" href="../../static/css/bootstrap.css">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 

</head>
<body>
<?Php 


if (isset($_POST['enviar'])) {
  $ndisco = $_POST['ndisco'];
  $asiento = $_POST['asiento'];
  $placa = $_POST['placa'];
  $marca = $_POST['marca'];
  $modelo = $_POST['modelo'];
  require('../../conexion.php'); //llama al archivo conexion
  $con=Conectar();
  
  $sql= "UPDATE bus SET bus_num_disco=:ndisco,bus_asientos=:asiento,bus_placa=:placa,bus_marca=:marca,bus_modelo=:modelo WHERE bus_id='".$_GET['id']."';";
  $q=$con->prepare($sql);
  $q->execute(array(':ndisco'=>$ndisco,':asiento'=>$asiento, ':placa'=>$placa,':marca'=>$marca,':modelo'=>$modelo));
  header("location:http://localhost/terminal/entidades/bus/listarBus.php");
}

?>
<nav class="navbar navbar-default">
  <div class="container-fluid"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#defaultNavbar1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
      <a class="navbar-brand" href="#">Brand</a></div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="defaultNavbar1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Link<span class="sr-only">(current)</span></a></li>
        <li><a href="#">Link</a></li>
        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container-fluid --> 
</nav>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h1 class="text-center"><strong>Facturación</strong></h1>
    </div>
  </div>
  <hr>

  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h3 class="text-center">MODIFICAR BUS</h3>
    </div>

  </div>
 <hr>

</div>
<div class="container">
  <div class="row text-center">
    <div class="col-md-6 col-md-offset-3 col-lg-offset-0 col-lg-12">
    
    </div>
   

    <form  method="post" >	


    <label>Numero de Disco</label>
    <input type="text" name="ndisco" id="ndisco" value="<?php echo $_GET['ndisco'];?>"><br>
    <label>Asiento</label>
    <input type="number" name="asiento" id="asiento" value="<?php echo $_GET['asiento'];?>"><br>
    <label>Placa</label>
    <input type="text" name="placa"id="placa" maxlength="8" value="<?php echo $_GET['placa'];?>"><br>
    <label>Marca</label>
    <input type="text" name="marca"id="marca" value="<?php echo $_GET['marca'];?>"><br>
    <label>Modelo</label>
    <input type="text" name="modelo"id="modelo" value="<?php echo $_GET['modelo'];?>"><br>

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


















</body>
</html>

