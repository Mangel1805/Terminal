<?php
$ndisco = $_POST['ndisco'];
$asiento = $_POST['asiento'];
$placa = $_POST['placa'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];


require('conexion.php');

$con = Conectar();
$sql = 'INSERT INTO bus (bus_num_disco,bus_asientos,bus_placa,bus_marca,bus_modelo)VALUES (:ndisco, :asiento, :placa,:marca,:modelo)';

$q = $con->prepare($sql);

$q->execute(array(':ndisco'=>$ndisco,':asiento'=>$asiento, ':placa'=>$placa,':marca'=>$marca,':modelo'=>$modelo));
header("location:http://localhost/terminal/listarBus.php");
?>

</body>
</html>