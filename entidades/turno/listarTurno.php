
<div class="container-fluid">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h1 class="text-center">Lista de Turnos</h1>
    </div>
  </div>
  <hr>
  
  
  <div class="text-center">
  <a href="../../Terminal/turno-insertar.php">
<input type="button"  class="btn-info btn-lg" name="button" id="button" value="Nuevo"></a>
  </div>
  
  
  <hr>
</div>
<div class="container">

<?Php

  //require('../../conexion.php'); //llama al archivo conexion
  $con=Conectar();
  $sql=$con->prepare('select * from turno'); //Se prepara la sentencia SQL
  $sql->execute(); //ejecutarla sentencia
  $resultado=$sql->fetchALL(PDO::FETCH_ASSOC); //FETCHALL devuleve un array que contiene todas las filas de una tabla

  // echo "<a href='formulario.php'>Insertar</a></br></br>";
   echo("<hr><table class='table table-bordered table-striped'>
    <thead>
        <tr>
            <th>#</th>
            <th>HORA</th>
            <th>CLIENTE</th>
            <th># ASIENTO</th>
            <th>DESCRIPCION</th>
            <th>VALOR</th>
            <th>BUS</th>
            <th>TERMINAL</th>
            <th>CODIGO</th>
            <th>--------</th>
        </tr>
    </thead>
    <tbody>");

   $sql1=$con->prepare('select * from horario'); //Se prepara la sentencia SQL
   $sql1->execute(); //ejecutarla sentencia
   $resultado1=$sql1->fetchALL(PDO::FETCH_ASSOC);
   
   $sql2=$con->prepare('select * from cliente'); //Se prepara la sentencia SQL
   $sql2->execute(); //ejecutarla sentencia
   $resultado2=$sql2->fetchALL(PDO::FETCH_ASSOC);
   
   $sql3=$con->prepare('select * from bus'); //Se prepara la sentencia SQL
   $sql3->execute(); //ejecutarla sentencia
   $resultado3=$sql3->fetchALL(PDO::FETCH_ASSOC);

   $sql4=$con->prepare('select * from terminal'); //Se prepara la sentencia SQL
   $sql4->execute(); //ejecutarla sentencia
   $resultado4=$sql4->fetchALL(PDO::FETCH_ASSOC);
   
   
    foreach($resultado as $row){
      foreach ($resultado1 as $row1) {
        if ($row["hor_id"]==$row1["hor_id"]) {
          foreach ($resultado2 as $row2) {
            if ($row["cli_id"]==$row2["cli_id"]) {
              foreach ($resultado3 as $row3) {
                if ($row["bus_id"]==$row3["bus_id"]) {
                  foreach ($resultado4 as $row4) {
                    if ($row["ter_id"]==$row4["ter_id"]) {
                      echo("<tr>
                            <td>".$row["tur_id"]."</td>
                            <td>".$row1["hor_hora"]."</td>
                            <td>".$row2["cli_nombre"]." ".$row2["cli_apellido"]."</td>
                            <td>".$row["tur_numero_asiento"]."</td>
                            <td>".$row["tur_asiento_descripcion"]."</td>
                            <td>".$row["tur_valor"]."</td>
                            <td>".$row3["bus_num_disco"]."</td>
                            <td>".$row4["ter_descripcion"]."</td>
                            <td>".$row["tur_codigo"]."</td>
                            <td><a href='eliminarTurno.php?id=".$row["tur_id"]."'>
                            <button type='button' class='btn btn-danger btn-sm'>
                                      <span class='glyphicon glyphicon-remove' aria-hidden='true'>
                                      </span>
                                  </button>
                            </a></td>
                            </tr>"
                        );
                    }
                  }
                }
              }
            }
          }
        }    
      }
    }
    
  echo "</tbody></table></div>";
  //header("location:http://localhost/mantenimiento/formulario.php")
?>
