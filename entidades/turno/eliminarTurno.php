<?Php 

  	require('../../conexion.php'); //llama al archivo conexion

	$id=$_GET['id'];
	$con=Conectar();
	$sql= "DELETE FROM horario WHERE hor_id=".$_GET['id'].";";
	$sql=$con->prepare($sql);
	$sql->bindparam(":id",$id);
	
	$sql->execute();
	header("location:http://localhost/terminal/entidades/horario/listarHorario.php");
	
?>