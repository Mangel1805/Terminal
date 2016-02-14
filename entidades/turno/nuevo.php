<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap - Prebuilt Layout</title>
<link href="../../static/css/bootstrap.css" rel="stylesheet">

</head>
<body>
<?php
if (isset($_POST['enviar'])) {
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$bus = $_POST['bus'];
$destino = $_POST['destino'];

require('../../conexion.php');

$con = Conectar();
$sql = 'INSERT INTO horario (hor_fecha,hor_hora,bus_id,des_id)VALUES (:fecha, :hora, :bus,:destino)';

$q = $con->prepare($sql);

$q->execute(array(':fecha'=>$fecha,':hora'=>$hora, ':bus'=>$bus,':destino'=>$destino));
header("location:http://localhost/terminal/entidades/horario/listarHorario.php");
}
?>
<nav class="navbar navbar-default">
 
  <!-- /.container-fluid --> 
</nav>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h1 class="text-center">Bootstrap with Dreamweaver</h1>
    </div>
  </div>
  <hr>
</div>
<div class="container">
  <div class="row text-center"></div>
  <div class="row"></div>
  <div class="row col-lg-12">
    <div class="col-md-6 text-center">
      <h4><strong>Nuevo Turno</strong></h4>
      <hr>
      <form id="form1" name="form1" method="post" >

          <label>Fecha</label>
          <input type="date" name="fecha" id="fecha" value=""><br>
          <label>hora</label>
          <input type="time" name="hora" id="hora" value=""><br>
          <label>bus</label>
         

          <select name="bus" id="bus"  class="mbn">
             <optgroup label="-----------">
                <?php 
                      require('../../conexion.php'); //llama al archivo conexion
                      $con=Conectar();
                    $sql=$con->prepare('select * from bus'); //Se prepara la sentencia SQL
                    $sql->execute(); //ejecutarla sentencia
                    $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);
                    foreach($resultado as $row)
                    {
                      $id=$row["bus_id"];
                      $disco=$row["bus_num_disco"];
                      echo("
                            <option value='".$id."'>".$disco."</option>
                         ");
                    }
                
         echo("</optgroup>
          </select>
          <br>
          <label>destino</label>
         <select name='destino' id='destino' class='mbn'>
                          <optgroup label='-----------''>");
          
                    $sql1=$con->prepare('select * from destino'); //Se prepara la sentencia SQL
                    $sql1->execute(); //ejecutarla sentencia
                    $resultado1=$sql1->fetchALL(PDO::FETCH_ASSOC);
                    foreach($resultado1 as $row1)
                    {
                      $id1=$row1["des_id"];
                      $disco1=$row1["des_descripcion"];
                      echo("
                            <option value='".$id1."'>".$disco1."</option>
                         ");
                    }
          ?>         
                          </optgroup>

                        </select>
          
      <br>
         <input type="submit" name="enviar">
          
         

        
          </form>

      <button type="button" class="btn btn-info btn-sm">Info Button</button>
      <button type="button" class="btn btn-success btn-sm">Success Button</button>
    </div>
    <div class="col-md-6 text-center">
      <h4><strong>Horarios de Viajes</strong></h4>
      <hr>
      <?Php

          $sql=$con->prepare('select * from horario'); //Se prepara la sentencia SQL
          $sql->execute(); //ejecutarla sentencia
          $resultado=$sql->fetchALL(PDO::FETCH_ASSOC); //FETCHALL devuleve un array que contiene todas las filas de una tabla

          // echo "<a href='formulario.php'>Insertar</a></br></br>";
           echo("<table class='table table-bordered table-striped'>
            <thead>
                <tr>
                    <th>#</th>
                    <th>FECHA</th>
                    <th>HORA</th>
                    <th>BUS</th>
                    <th>DESTINO</th>
                </tr>
            </thead>
            <tbody>");
           $sql1=$con->prepare('select * from destino'); //Se prepara la sentencia SQL
           $sql1->execute(); //ejecutarla sentencia
           $resultado1=$sql1->fetchALL(PDO::FETCH_ASSOC);
           
           $sql2=$con->prepare('select * from bus'); //Se prepara la sentencia SQL
           $sql2->execute(); //ejecutarla sentencia
           $resultado2=$sql2->fetchALL(PDO::FETCH_ASSOC);
            foreach($resultado as $row){
              foreach($resultado1 as $row1){                 
                if ($row["des_id"]==$row1["des_id"]) {
                  foreach($resultado2 as $row2){                 
                      if ($row["bus_id"]==$row2["bus_id"]) {
                            echo("<tr>
                                    <td>".$row["hor_id"]."</td>
                                    <td>".$row["hor_fecha"]."</td>
                                    <td>".$row["hor_hora"]."</td>
                                    <td>".$row2["bus_num_disco"]."</td>
                                    <td>".$row1["des_descripcion"]."</td>
                                </tr>");
                      }
                  }
                }
              }
            }
            
          echo "</tbody></table>";
        ?>
    </div>
            
  </div>
  <div class="row">
    <div class="text-center col-md-6 col-md-offset-3">
      <h4>Footer </h4>
      <p>Copyright &copy; 2015 &middot; All Rights Reserved &middot; <a href="http://yourwebsite.com/" >My Website</a></p>
    </div>
  </div>
  <hr>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="../../static/js/jquery-1.11.2.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="../../static/js/bootstrap.js"></script>


</body>
</html>
