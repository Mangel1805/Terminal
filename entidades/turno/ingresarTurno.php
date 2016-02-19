
<?php
if (isset($_POST['enviar'])) {
$cliente=$_POST['cliente'];
$terminal=$_POST['terminal'];
$bus=$_POST['bus'];
$asiento=$_POST['asiento'];
$descripcion=$_POST['descripcion'];
$hora=$_POST['hora'];
$codigo = $_POST['codigo'];
$valor=$_POST['valor'];


//require('../../conexion.php');

$con = Conectar();
$sql = 'INSERT INTO turno (tur_numero_asiento,tur_asiento_descripcion,tur_valor,tur_codigo,hor_id,cli_id,bus_id,ter_id)VALUES (:asiento,:descripcion,:valor,:codigo,:hora,:cliente,:bus,:terminal)';

$q = $con->prepare($sql);

$q->execute(array(':cliente'=>$cliente,':terminal'=>$terminal, ':bus'=>$bus,':asiento'=>$asiento,':descripcion'=>$descripcion,':hora'=>$hora,':codigo'=>$codigo,':valor'=>$valor));
  header("location:http://localhost/terminal/entidades/turno/listarTurno.php"); 
}
?>
<nav class="navbar navbar-default">
 
  <!-- /.container-fluid --> 
</nav>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h1 class="text-center">Reservación de Turno</h1>
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
          <label>Cliente</label><br>
              <?php 
                echo("<select name='cliente' id='cliente'  class='mbn'>
                     <optgroup label='-----------'>");
                    //require('../../conexion.php'); //llama al archivo conexion
                    $con=Conectar();
                    $sql=$con->prepare('select * from cliente'); //Se prepara la sentencia SQL
                    $sql->execute(); //ejecutarla sentencia
                    $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);
                    foreach($resultado as $row)
                    {
                      $id=$row["cli_id"];
                      $descripcion=$row["cli_cedula"];
                      echo("
                            <option value='".$id."'>".$descripcion."</option>
                         ");
                      
                    }
                    echo("</optgroup>
                        </select><br> ");
              ?>

          <label>Terminal</label><br>
              <?php 
                echo("<select name='terminal' id='terminal'  class='mbn'>
                     <optgroup label='-----------'>");
                  
                    $sql=$con->prepare('select * from terminal'); //Se prepara la sentencia SQL
                    $sql->execute(); //ejecutarla sentencia
                    $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);
                    foreach($resultado as $row)
                    {
                      $id=$row["ter_id"];
                      $descripcion=$row["ter_descripcion"];
                      echo("
                            <option value='".$id."'>".$descripcion."</option>
                         ");
                      
                    }
                    echo("</optgroup>
                        </select><br> ");
              ?>  
                  
          <label>bus</label><br>
           <?php 
                echo("<select name='bus' id='bus'  class='mbn'>
                     <optgroup label='-----------'>");
                    
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
                        </select><br> ");
              ?>  
        
          <label>Asiento</label><br>
          <input type="text" class="form-control  text-center" name="asiento" id="asiento" value=""><br>
          <label>Descripcion</label><br>
          <textarea  name="descripcion" id="descripcion"class="form-control" rows="3"></textarea><br>
          <label>hora</label><br>
           <?php 
                echo("<select name='hora' id='hora'  class='mbn'>
                     <optgroup label='-----------'>");
                    
                    $sql=$con->prepare('select * from horario'); //Se prepara la sentencia SQL
                    $sql->execute(); //ejecutarla sentencia
                    $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);
                    foreach($resultado as $row)
                    {
                      $id=$row["hor_id"];
                      $disco=$row["hor_hora"];
                      echo("
                            <option value='".$id."'>".$disco."</option>
                         ");
                      
                    }
                    echo("</optgroup>
                        </select><br> ");
              ?> 
          <label>Codigo</label><br>
              <?php 
                function generarClave ()  { 
                    $letras =  '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ' ; 
                    $letrasLength = strlen ( $letras ); 
                    $clave =  '' ; 
                    for  ( $i =  0 ; $i < 8 ; $i ++)  { 
                        $clave .= $letras [ rand ( 0 , $letrasLength -  1 )]; 
                    } 
                    return $clave ; 
                }
               echo("<input type='text' class='form-control text-center'name='codigo' id='codigo' value='".generarClave()."' readonly='readonly'>");
               ?>
      <br>
      <label>Valor</label><br>
      <input type="text" class="form-control text-center" name="valor" id="valor" value="4">  <br>
         <input type="submit" name="enviar">
          
         

        
          </form>

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
  

