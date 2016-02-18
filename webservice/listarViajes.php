<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap - Prebuilt Layout</title>

<!-- Bootstrap -->
<link href="../static/css/bootstrap.css" rel="stylesheet">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 

</head>
<body>
<?Php
if (isset($_POST['enviar'])) {
  require('../../conexion.php'); //llama al archivo conexion
  $con=Conectar();
  $sql = $con->prepare("SELECT * FROM historial where his_cedula='".$_POST['cedula']."'");//preparamos nuestra sentencia SQL
  $sql->execute(); //ejecutarla sentencia
  $sql->execute(); //ejecutarla sentencia
  $resultado=$sql->fetchALL(PDO::FETCH_ASSOC); //FETCHALL devuleve un array que contiene todas las filas de una tabla

  // echo "<a href='formulario.php'>Insertar</a></br></br>";
   echo("<hr><table class='table table-bordered table-striped'>
    <thead>
        <tr>
            <th>Cédula</th>
            <th>Nombre</th>
            <th>Código</th>
            <th>Hora</th>
            <th>Fecha</th>
            <th>N. Asientos</th>
            <th>Descripción</th>
            <th>Bus</th>
            <th>Destino</th>
            <th>Total</th>
            <th>--------</th>
            <th>--------</th>
        </tr>
    </thead>
    <tbody>");
       
  foreach($resultado as $row)
  {
   // echo("<tr> <td>". $row["per_ced"]."</td><td>".$row["per_nombre"].  " </td><td> ".$row["per_apellido"]."</td><td>".$row["per_telefono"]."</td><td>".$row["per_direccion"]."</td><td>".$row["per_ciudad"]."</td><td>".$row["per_email"]."</td><td><a href='up.php?id=".$row["per_id"]."  '>Eliminar</a></td><td><a href='eli.php?id=".$row["per_id"]."'>Eliminar</a></td></tr>");
    echo("<tr>
            <td>".$row["ard_id"]."</td>
            <td>".$row["ard_terminal"]."</td>
            <td>".$row["ard_descipcion"]."</td>
            <td>".$row["ard_valor"]."</td>
           <td><a href='actualizarArden.php?
            id=".$row["ard_id"].
            "&terminal=".$row["ard_terminal"].
            "&descripcion=".$row["ard_descipcion"].
            "&valor=".$row["ard_valor"].
            "'><button type='button' class='btn btn-primary btn-sm'>
                  <span class='glyphicon glyphicon-edit' aria-hidden='true'>
                  </span>
               </button>
            </a></td>
            <td><a href='eliminarArden.php?id=".$row["ard_id"]."  '>
            <button type='button' class='btn btn-danger btn-sm'>
                      <span class='glyphicon glyphicon-remove' aria-hidden='true'>
                      </span>
                  </button>
            </a></td>
        </tr>");
  }
    
  echo "</tbody></table></div>";
  //header("location:http://localhost/mantenimiento/formulario.php")
}
?>
<div class="container-fluid">


  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h3 class="text-center">Revisar Turno</h3>
    </div>

  </div>
 <hr>

</div>
<div class="container">
  <div class="row text-center">
    <div class="col-md-6 col-md-offset-3 col-lg-offset-0 col-lg-12">
    
    </div>

    <form id="form1" name="form1" method="post" >

    <label>Turno</label>
    <input type="text" class="form-control" name="cedula" id="cedula" value=""><br>
    
<br>
   <input class="btn btn-success btn-lg"  value="Consultar" type="submit" name="enviar">
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


<script src="../static/js/jquery.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="../static/js/bootstrap.js"></script>
</html>
