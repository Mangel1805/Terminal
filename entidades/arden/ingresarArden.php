<?php
if (isset($_POST['enviar'])) {
$terminal = $_POST['terminal'];
$descripcion = $_POST['descripcion'];
$valor = $_POST['valor'];
//require('../../conexion.php');

$con = Conectar();
$sql = 'INSERT INTO arden (ard_terminal,ard_descipcion,ard_valor)VALUES (:terminal, :descripcion, :valor)';

$q = $con->prepare($sql);

$q->execute(array(':terminal'=>$terminal,':descripcion'=>$descripcion, ':valor'=>$valor));
header("location:http://localhost/Terminal/arden-listar.php");
}
?>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h3 class="text-center">Nuevo Bus</h3>
    </div>
  </div>
  <hr>
</div>
<div class="container">
  <div class="row text-center">
    <div class="col-md-6 col-md-offset-3 col-lg-offset-0 col-lg-12"> </div>
    <form id="form1" name="form1" method="post" >
      <label>Terminal</label>
      <input type="text" name="terminal" id="terminal" value="">
      <br>
      <label>descripcion</label>
      <input type="text" name="descripcion" id="descripcion" value="">
      <br>
      <label>valor</label>
      <input type="text" name="valor"id="valor" value="">
      <br>
      <br>
      <input type="submit" name="enviar">
    </form>
  </div>
  <hr>
</div>
