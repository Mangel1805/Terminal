<?Php 

  	require('../../conexion.php'); //llama al archivo conexion

	$id=$_GET['id'];
	$con=Conectar();
	$sql= "DELETE FROM cliente WHERE cli_id=".$_GET['id'].";";
	$sql=$con->prepare($sql);
	$sql->bindparam(":id",$id);
	
	$sql->execute();
	header("location:http://localhost/terminal/entidades/cliente/listarCliente.php");
	
?>