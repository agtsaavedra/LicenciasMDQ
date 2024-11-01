<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Inicio</title>
	    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="http://127.0.0.1/Licencias/CSS/menu.css">


</head>
<body>
	<header>
		<center>
		<img class="banner" src="Imagenes/indeximage.jpg">
		<img class="banner" src="Imagenes/muni.png">
		</center>
		<nav class="navegacion">
			<ul class="menu">
				<li><a href="inicio.php">Inicio</a></li>
				<li><a href="#">Gestion de Turnos</a>
					<ul class="submenu">
						<li><a href="nueva_persona.php">Nueva Persona</a></li>
						<li><a href="nuevo_turno_pregunta.php">Nuevo Turno</a></li>
						<li><a href="modificar_turno.php">Modificar Turno</a></li>
						<li><a href="modificar_persona.php">Modificar Persona</a></li>
						<li><a href="listado_turnos.php">Listado Turnos por Tramite</a></li>
					</ul>
				</li>
				
				<li><a href="#">Gestion de Resultados</a>
					<ul class="submenu">
						<li><a href="registro_resultado.php">Nuevo Resultado</a></li>
						<li><a href="modificar_resultado.php">Modificar Resultado</a></li>
						
						<li><a href="consulta_resultado.php">Consultar Resultado Diario Tramite</a></li>

					</ul>
				</li>


					<li><a href="#">Estadisticas</a>
					<ul class="submenu">
						<li><a href="listado_turnos_barrio.php">Turnos por Barrio</a></li>
						<li><a href="listado_resultado_barrio.php">Aprobados / Desaprobados por barrio</a></li>
						<li><a href="listado_barrio_tramite.php">Aprobados / Desaprobados por tramite</a></li>
					</ul>
				</li>

					<li class="item_r"><a href="login.php">Cerrar Sesion</a></li>


			</ul>
		</nav>
	</header>

<?php 
$conexion = mysqli_connect("localhost","root","");
mysqli_select_db($conexion,"licencias") or die("ERROR AL CONENCTARSE");
mysqli_set_charset($conexion,"utf8");



$dni_inicial=$_POST['dni1'];
$dni=$_POST['dni'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$fecha=$_POST['fecha'];
$sexo=$_POST['cbx_sexo'];
$barrio=$_POST['cbx_barrio'];

$consulta5 = "UPDATE `personas` SET `dni_personas` = '$dni', `nombre` = '$nombre', `apellido` = '$apellido', `fecha_nac` = '$fecha', `sexo` = '$sexo', `id_barrio` = '$barrio'     WHERE `personas`.`dni_personas` = $dni_inicial;";

$consulta4 = "UPDATE `turnos` SET `dni_personas` = '$dni'WHERE `turnos`.`dni_personas` = $dni_inicial;";



$resultado4=mysqli_query($conexion,$consulta4);

$resultado5=mysqli_query($conexion,$consulta5);

if ($resultado5) {
	if ($resultado4) {
		echo("Se ha modificado correctamente");
	}else{echo "no se ha modificado";}

	
}else{

	echo "No se ha modificado";
}

 ?>



</body>
</html>