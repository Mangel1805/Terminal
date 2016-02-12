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
  $cedula = $_POST['cedula'];
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $telefono = $_POST['telefono'];
  $direccion = $_POST['direccion'];


  require('../../conexion.php'); //llama al archivo conexion
  $con=Conectar();
  
  $sql= "UPDATE cliente SET cli_cedula=:cedula,cli_nombre=:nombre,cli_apellido=:apellido,cli_telefono=:telefono,cli_direccion=:direccion WHERE cli_id='".$_GET['id']."';";
  $q=$con->prepare($sql);
  $q->execute(array(':cedula'=>$cedula,':nombre'=>$nombre, ':apellido'=>$apellido, ':telefono'=>$telefono, ':direccion'=>$direccion));
  header("location:http://localhost/terminal/entidades/cliente/listarCliente.php");
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
      <h1 class="text-center"><strong>Terminal</strong></h1>
    </div>
  </div>
  <hr>

  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h3 class="text-center">MODIFICAR Cliente</h3>
    </div>

  </div>
 <hr>

</div>
<div class="container">
  <div class="row text-center">
    <div class="col-md-6 col-md-offset-3 col-lg-offset-0 col-lg-12">
    
    </div>
   

    <form  method="post" >	
    <label>cedula</label>
    <input type="text" name="cedula" id="cedula" value="<?php echo $_GET['cedula'];?>"><br>
    <label>nombre</label>
    <input type="text" name="nombre" id="nombre" value="<?php echo $_GET['nombre'];?>"><br>
    <label>apellido</label>
    <input type="text" name="apellido"id="apellido" value="<?php echo $_GET['apellido'];?>"><br>
    <label>telefono</label>
    <input type="text" name="telefono"id="telefono" value="<?php echo $_GET['telefono'];?>"><br>
    <label>direccion</label>
    <input type="text" name="direccion"id="direccion" value="<?php echo $_GET['direccion'];?>"><br>
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

