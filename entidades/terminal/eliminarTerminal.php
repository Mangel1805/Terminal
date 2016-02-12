<?Php 

  	require('../../conexion.php'); //llama al archivo conexion

	$id=$_GET['id'];
	$con=Conectar();
	$sql= "DELETE FROM terminal WHERE ter_id=".$_GET['id'].";";
	$sql=$con->prepare($sql);
	$sql->bindparam(":id",$id);
	
	$sql->execute();
	header("location:http://localhost/terminal/entidades/terminal/listarTerminal.php");
	
?>