<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>terminal</title>

<!-- Bootstrap -->
<link href="../../static/css/bootstrap.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<nav class="navbar navbar-default"> <!-- /.container-fluid --> 
</nav>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h1 class="text-center">Lista de Terminales</h1>
    </div>
  </div>
  <hr>
  
  
  <div class="text-center">
  <a href="ingresarTerminal.php">
<input type="button"  class="btn-info btn-lg" name="button" id="button" value="Nuevo"></a>
  </div>
  
  
  <hr>
</div>
<div class="container">

<?Php

  require('../../conexion.php'); //llama al archivo conexion
  $con=Conectar();
  $sql=$con->prepare('select * from terminal'); //Se prepara la sentencia SQL
  $sql->execute(); //ejecutarla sentencia
  $resultado=$sql->fetchALL(PDO::FETCH_ASSOC); //FETCHALL devuleve un array que contiene todas las filas de una tabla

  // echo "<a href='formulario.php'>Insertar</a></br></br>";
   echo("<hr><table class='table table-bordered table-striped'>
    <thead>
        <tr>
            <th>#</th>
            <th>DESCRIPCIÓN</th>
            <th>--------</th>
            <th>--------</th>
        </tr>
    </thead>
    <tbody>");
       
  foreach($resultado as $row)
  {
   // echo("<tr> <td>". $row["per_ced"]."</td><td>".$row["per_nombre"].  " </td><td> ".$row["per_apellido"]."</td><td>".$row["per_telefono"]."</td><td>".$row["per_direccion"]."</td><td>".$row["per_ciudad"]."</td><td>".$row["per_email"]."</td><td><a href='up.php?id=".$row["per_id"]."  '>Eliminar</a></td><td><a href='eli.php?id=".$row["per_id"]."'>Eliminar</a></td></tr>");
    echo("<tr>
            <td>".$row["ter_id"]."</td>
            <td>".$row["ter_descripcion"]."</td>
            <td><a href='actualizarTerminal.php?
            id=".$row["ter_id"].
            "&descripcion=".$row["ter_descripcion"].
            "'><button type='button' class='btn btn-primary btn-sm'>
                  <span class='glyphicon glyphicon-edit' aria-hidden='true'>
                  </span>
               </button>
            </a></td>
            <td><a href='eliminarTerminal.php?id=".$row["ter_id"]."  '>
            <button type='button' class='btn btn-danger btn-sm'>
                      <span class='glyphicon glyphicon-remove' aria-hidden='true'>
                      </span>
                  </button>
            </a></td>
        </tr>");
  }
    
  echo "</tbody></table></div>";
  //header("location:http://localhost/mantenimiento/formulario.php")
?>
 <hr>
  <div class="row">
    <div class="text-center col-md-6 col-md-offset-3">
      <h4>Footer </h4>
      <p>Copyright &copy; 2015 &middot; All Rights Reserved &middot; <a href="http://yourwebsite.com/" >My Website</a></p>
    </div>
  </div>
  

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="../../static/js/jquery-1.11.2.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="../../static/js/bootstrap.js"></script>



</body>
</html>
  