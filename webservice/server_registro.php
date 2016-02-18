<?php
require_once('../lib/nusoap.php');
require("../conexion.php");
$server = new nusoap_server;
$server->configureWSDL('PHPCentral', 'urn:phpcentral');
$server->wsdl->schemaTargetNamespace = 'urn:phpcentral';

//register a function that works on server
 //$server->register('consulta_codigo');
$server->register('consulta_codigo', array('turno' => 'xsd:string'), array('return' => 'xsd:string'));

 // create age calculation function
 // create the function 
 function consulta_codigo($turno)
 {
  	//$result['status'] = "Test goes here";
   	if(!$turno){
    		return new soap_fault('Client','','Sanjoy Dey!');
   	}  
	$con = Conectar();
	$sql = $con->prepare("SELECT * FROM turno where tur_codigo='".$turno."'");//preparamos nuestra sentencia SQL
	$sql->execute();//EJECUTAMOS LA SENTENCIA
	$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);//fetchAll Devuelve un array que contiene todas las filas del conjunto de resultados
	
	foreach ($resultado as $row) {// FOREACH RECORRE ARRAYS, $resultado contiene un array de la consulta
		$result = array('codigo'=>$row['tur_codigo'],'asiento'=>$row['tur_numero_asiento'],'descripcion'=>$row['tur_asiento_descripcion'],'destino'=>destino(horaDestino($row['hor_id'])),'valor'=>$row['tur_valor'],'hora'=>hora($row['hor_id']),'bus'=>bus($row['bus_id']),'cedula'=>clienteCedula($row['cli_id']),'nombre'=>clienteNombre($row['cli_id']));

	}
  		return json_encode($result);
 }


 function hora($id)
 {
	$con = Conectar();
	$sql = $con->prepare("SELECT * FROM horario where hor_id='".$id."'");//preparamos nuestra sentencia SQL
	$sql->execute();//EJECUTAMOS LA SENTENCIA
	$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);//fetchAll Devuelve un array que contiene todas las filas del conjunto de resultados
	
	foreach ($resultado as $row) {// FOREACH RECORRE ARRAYS, $resultado contiene un array de la consulta
		$result = $row['hor_hora'];
		
	}return ($result);
  		
 }

 function bus($id)
 {
	$con = Conectar();
	$sql = $con->prepare("SELECT * FROM bus where bus_id='".$id."'");//preparamos nuestra sentencia SQL
	$sql->execute();//EJECUTAMOS LA SENTENCIA
	$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);//fetchAll Devuelve un array que contiene todas las filas del conjunto de resultados
	
	foreach ($resultado as $row) {// FOREACH RECORRE ARRAYS, $resultado contiene un array de la consulta
		$result = $row['bus_num_disco'];
		
	}return ($result);
  		
 }

 function clienteCedula($id)
 {
	$con = Conectar();
	$sql = $con->prepare("SELECT * FROM cliente where cli_id='".$id."'");//preparamos nuestra sentencia SQL
	$sql->execute();//EJECUTAMOS LA SENTENCIA
	$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);//fetchAll Devuelve un array que contiene todas las filas del conjunto de resultados
	
	foreach ($resultado as $row) {// FOREACH RECORRE ARRAYS, $resultado contiene un array de la consulta
		$result = $row['cli_cedula'];
		
	}return ($result);
  		
 }

 function clienteNombre($id)
 {
	$con = Conectar();
	$sql = $con->prepare("SELECT * FROM cliente where cli_id='".$id."'");//preparamos nuestra sentencia SQL
	$sql->execute();//EJECUTAMOS LA SENTENCIA
	$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);//fetchAll Devuelve un array que contiene todas las filas del conjunto de resultados
	
	foreach ($resultado as $row) {// FOREACH RECORRE ARRAYS, $resultado contiene un array de la consulta
		$result = $row['cli_nombre']." ".$row['cli_apellido'];
		
	}return ($result);
  		
 }


 function horaDestino($id)
 {
	$con = Conectar();
	$sql = $con->prepare("SELECT * FROM horario where hor_id='".$id."'");//preparamos nuestra sentencia SQL
	$sql->execute();//EJECUTAMOS LA SENTENCIA
	$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);//fetchAll Devuelve un array que contiene todas las filas del conjunto de resultados
	
	foreach ($resultado as $row) {// FOREACH RECORRE ARRAYS, $resultado contiene un array de la consulta
		$result = $row['des_id'];
		
	}return ($result);
  		
 }


 function destino($id)
 {
	$con = Conectar();
	$sql = $con->prepare("SELECT * FROM destino where des_id='".$id."'");//preparamos nuestra sentencia SQL
	$sql->execute();//EJECUTAMOS LA SENTENCIA
	$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);//fetchAll Devuelve un array que contiene todas las filas del conjunto de resultados
	
	foreach ($resultado as $row) {// FOREACH RECORRE ARRAYS, $resultado contiene un array de la consulta
		$result = $row['des_descripcion'];
		
	}return ($result);
  		
 }

$HTTP_RAW_POST_DATA = (isset($HTTP_RAW_POST_DATA)) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);
exit();

?>
