<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Webservice|listar</title>

<!-- Bootstrap -->
<link href="../static/css/bootstrap.css" rel="stylesheet">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 

</head>
<body>

<div class="container-fluid">


  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h3 class="text-center">Lista de Viajes</h3>
    </div>

  </div>
 <hr>

</div>
<div class="container">
  <div class="row text-center">
    <div class="col-md-6 col-md-offset-3 col-lg-offset-0 col-lg-12">
    
    </div>

    <form id="form1" name="form1" method="post" >

    <label>Ingrese Cedula</label>
    <input type="text" class="form-control" name="cedula" id="cedula" value=""><br>
    
<br>
   <input class="btn btn-success btn-lg"  value="Consultar" type="submit" name="enviar">
    </form>

  </div>
  
  </div>
<?Php
if (isset($_POST['enviar'])) {
  require('conexion.php'); //llama al archivo conexion
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
           
        </tr>
    </thead>
    <tbody>");
       
  foreach($resultado as $row)
  {

    echo("<tr>
            <td>".$row["his_cedula"]."</td>
            <td>".$row["his_nombre"]."</td>
            <td>".$row["his_bol_codigo"]."</td>
            <td>".$row["his_hora"]."</td>
            <td>".$row["his_fecha"]."</td>
            <td>".$row["his_asiento"]."</td>
            <td>".$row["his_descripcion"]."</td>
            <td>".$row["his_bus"]."</td>
            <td>".$row["his_destino"]."</td>
            <td>".$row["his_total"]."</td>
           
        </tr>");
  }
    
  echo "</tbody></table></div><hr>";
  //header("location:http://localhost/mantenimiento/formulario.php")
}
?>
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
