
<?php
if (isset($_POST['enviar'])) {
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$bus = $_POST['bus'];
$destino = $_POST['destino'];

  //require('../../conexion.php'); //llama al archivo conexion
  $con=Conectar();
  $sql= "UPDATE horario SET hor_fecha=:fecha,hor_hora=:hora,bus_id=:bus,des_id=:destino WHERE hor_id='".$_GET['id']."';";
  $q=$con->prepare($sql);
  $q->execute(array(':fecha'=>$fecha,':hora'=>$hora, ':bus'=>$bus,':destino'=>$destino));
  header("location:http://localhost/terminal/entidades/horario/listarHorario.php"); 


}
?>
<div class="container-fluid">


  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h3 class="text-center">Modificar Horario</h3>
    </div>

  </div>
 <hr>

</div>
<div class="container">
  <div class="row text-center">
    <div class="col-md-6 col-md-offset-3 col-lg-offset-0 col-lg-12">
    
    </div>
   

    <form id="form1" name="form1" method="post" >

    <label>Fecha</label>
    <input type="date" name="fecha" id="fecha" value="<?php echo $_GET['fecha'];?>"><br>
    <label>hora</label>
    <input type="time" name="hora" id="hora" value="<?php echo $_GET['hora'];?>"><br>
    <label>bus</label>
   

    <select name="bus" id="bus"  class="mbn">
       <optgroup label="-----------">
          <?php 
              //require('../../conexion.php'); //llama al archivo conexion
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

  </div>
  
  
  
  
  
  
  <hr>
  
  </div>
  