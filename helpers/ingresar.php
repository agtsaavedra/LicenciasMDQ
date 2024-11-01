<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
	
	session_start(); 

	try {

	$base = new PDO("mysql:host=localhost; dbname=licencias","root", "");

	$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$sql="SELECT * FROM usuarios WHERE usuario = :usuario AND password = :password";
	
	$resultado=$base->prepare($sql);

	$usuario=htmlentities(addslashes($_POST["usuario"]));

	$password=htmlentities(addslashes($_POST["password"]));

	$resultado->bindValue(":usuario", $usuario);

	$resultado->bindValue(":password", $password);

	$resultado->execute();

	$numero_registro=$resultado->rowCount();

	if($numero_registro!=0){

		header("location: inicio.php");
	} else{

		header("location: error_login.php");

	}

		

	} catch (Exception $e) {

		die("Error: ". $e->getMessage());
	
	}

	

?>


</body>
</html>