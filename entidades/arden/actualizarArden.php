<?Php 


if (isset($_POST['enviar'])) {
  $terminal = $_POST['terminal'];
  $descripcion = $_POST['descripcion'];
  $valor = $_POST['valor'];

  $con=Conectar();
  
  $sql= "UPDATE arden SET ard_terminal=:terminal,ard_descipcion=:descripcion,ard_valor=:valor WHERE ard_id='".$_GET['id']."';";
  $q=$con->prepare($sql);
  $q->execute(array(':terminal'=>$terminal,':descripcion'=>$descripcion, ':valor'=>$valor));
  header("location:http://localhost/Terminal/arden-listar.php");
}

?>

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
    <div class="col-md-6 col-md-offset-3 col-lg-offset-0 col-lg-12"> </div>
    <form  method="post" >
      <label>Terminal</label>
      <input type="text" name="terminal" id="terminal" value="<?php echo $_GET['terminal'];?>">
      <br>
      <label>descripcion</label>
      <input type="text" name="descripcion" id="descripcion" value="<?php echo $_GET['descripcion'];?>">
      <br>
      <label>valor</label>
      <input type="text" name="valor"id="valor" value="<?php echo $_GET['valor'];?>">
      <br>
      <br>
      <input type="submit" name="enviar">
    </form>
  </div>
  <hr>
</div>
