<?Php
	function Conectar()
	{
		$conn=null;
		$host='127.0.0.1'; //[localhost]
		$db='terminal'; //database name
		$user='root'; //user name
		$passw=''; //password
		try
		{
			$conn = new PDO('mysql:host='.$host.';dbname='.$db, $user, $passw); //PDO extension de objetos de PHP, interfaz de base de datos
		}
		catch(PDOException $e){ 
			//echo "error: ".$e->getMessage();
		}
		return $conn;
	}
	function Conectar1()
	{
		$conn=null;
		$host='127.0.0.1'; //[localhost]
		$db='terminal'; //database name
		$user='root'; //user name
		$passw=''; //password
		try
		{
			$conn = new PDO('mysql:host='.$host.';dbname='.$db, $user, $passw); //PDO extension de objetos de PHP, interfaz de base de datos
		}
		catch(PDOException $e){ 
			//echo "error: ".$e->getMessage();
		}
		return $conn;
	}
?>