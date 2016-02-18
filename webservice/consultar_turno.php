<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Terminal|Consulta</title>

<!-- Bootstrap -->
<link href="../static/css/bootstrap.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<nav class="navbar navbar-default"> <!-- /.container-fluid --> 
</nav>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h1 class="text-center">Resultado del Turno</h1>
    </div>
  </div>
  <hr>
  

</div>
<div class="container">

<?php
		if (isset($_POST['enviar'])) {

			require_once('../lib/nusoap.php');
			header('Content-type: text/html');

			//$client = new nusoap_client('http://localhost/webservice/server_registro.php');
			$urlWebService = 'http://localhost/Terminal/webservice/server_registro.php';
			$urlWSDL = $urlWebService . '?wsdl';

			// Creo el objeto soapclient
			$client = new nusoap_client($urlWSDL, 'wsdl');


			//$response=array();
			$response = $client->call('consulta_codigo',array('turno' => $_POST['codigo']));
			$response1=json_decode($response,true);

			echo "<pre>";

			//print_r(json_decode($response));
			echo("<table class='table table-bordered table-striped'>
			    <thead>
			        <tr>
			            <th>ASIENTO</th>
			            <th>DESCRIPCION</th>
			            <th>VALOR</th>
			            <th>HORA</th>
			             <th>BUS</th>

			        </tr>
			    </thead>
			    <tbody>");

			//print_r($response1['asiento']." ".$response1['descripcion']." ".$response1['valor']." ".$response1['hora']." ".$response1['bus']);

			echo("<tr>
			            <td>".$response1['asiento']."</td>
			            <td>".$response1['descripcion']."</td>
			            <td>".$response1['valor']."</td>
			            <td>".$response1['hora']."</td>
			            <td>".$response1['bus']."</td>
			           
			        </tr>");
			//$myVar = json_decode($response['nombres']);
			//print_r($myVar);

			 echo "</tbody></table></div>";

			
		  require('conexion.php'); //llama al archivo conexion
		  $con=Conectar();
		  $sql = $con->prepare("SELECT * FROM historial where his_bol_codigo='".$response1['codigo']."'");//preparamos nuestra sentencia SQL
		  $sql->execute(); //ejecutarla sentencia
		  $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);
			if (empty($resultado)) {

			$cedula = $response1['cedula'];
			$nombre = $response1['nombre'];
			$codigo = $response1['codigo'];
			$hora = $response1['hora'];
			$fecha=date("y-m-d");
			$asiento = $response1['asiento'];
			$descripcion = $response1['descripcion'];
			$bus = $response1['bus'];
			$destino = $response1['destino'];
			$valor = $response1['valor'];

			$con = Conectar();
			$sql1 = 'INSERT INTO historial(his_cedula,his_nombre,his_bol_codigo,his_hora,his_fecha,his_asiento,his_descripcion,his_bus,his_destino,his_total)VALUES (:cedula,:nombre,:codigo,:hora,:fecha,:asiento,:descripcion,:bus,:destino,:valor)';
			$q = $con->prepare($sql1);
			$q->execute(array(':cedula'=>$cedula,':nombre'=>$nombre, ':codigo'=>$codigo, ':hora'=>$hora, ':fecha'=>$fecha, ':asiento'=>$asiento, ':descripcion'=>$descripcion, ':bus'=>$bus, ':destino'=>$destino, ':valor'=>$valor));
		}
	}
?>
 <hr>
  <div class="row">
    <div class="text-center col-md-6 col-md-offset-3">
      <h4>Footer </h4>
      <p>Copyright &copy; 2015 &middot; All Rights Reserved &middot; <a href="http://yourwebsite.com/" >My Website</a></p>
    </div>
  </div>
  

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="../../static/js/jquery-1.11.2.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="../../static/js/bootstrap.js"></script>



</body>
</html>
