<?php 
error_reporting(0);

 ?>


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
						
						<li><a href="cantidad_resultado_diario.php">Consultar Resultado Diario Tramite</a></li>

					</ul>
				</li>


					<li><a href="#">Estadisticas</a>
					<ul class="submenu">
						<li><a href="cantidad_turnos_barrio.php">Turnos por Barrio</a></li>
						<li><a href="listado_resultados_barrio.php">Aprobados / Desaprobados por barrio</a></li>
						<li><a href="listado_resultados_tramite.php">Aprobados / Desaprobados por tramite</a></li>
					</ul>
				</li>

					<li class="item_r"><a href="login.php">Cerrar Sesion</a></li>


			</ul>
		</nav>
	</header>



	<center>
		<h1> <font color="white">Ingrese resultados </font><h1>
<font color="white">
	 <form action="guardar_resultado.php" method="POST">
	 	<input type="hidden" name="dni2" value="<?php echo $dni=$_POST['dni']; ?>">
	 	<input type="hidden" name="id_turnos2" value="<?php echo $id_turnos=$_POST['id_turnos']; ?>">
	 	<input type="hidden" name="id_tramites2" value="<?php echo $id_tramites=$_POST['id_tramites']; ?>">

		<select name="cbx_calificacion" id="cbx_calificacion">
      	<option value="0">Seleccione Calificacion</option>
      	<option value="1">1</option>
      	<option value="2">2</option>
      	<option value="3">3</option>
      	<option value="4">4</option>
      	<option value="5">5</option>
      	<option value="6">6</option>
      	<option value="7">7</option>
      	<option value="8">8</option>
      	<option value="9">9</option>
      	<option value="10">10</option>
      	</select> <br> <br>

      <select name="cbx_resultado" id="cbx_resultado">
      		<option value="0">Seleccione Resultado</option>
      		<option value="Aprobado">Aprobado</option>
      		<option value="Desaprobado">Desaprobado</option>
		</select>
		<br> <br>
	<input type="submit" value="Aceptar"> 
    </form>
</font>

<?php
$conexion = mysqli_connect("localhost","root","");
mysqli_select_db($conexion,"licencias") or die("ERROR AL CONENCTARSE");
mysqli_set_charset($conexion,"utf8");

	$id_turnos3=$_POST['id_turnos2'];
	$dni3=$_POST['dni2'];
	$id_tramites3=$_POST['id_tramites2'];

	$resultadox=$_POST['cbx_resultado'];
	$calificacion=$_POST['cbx_calificacion'];
	

	
	$query1 = "INSERT INTO `resultados` (`dni_personas`, `resultado`, `id_tramites`, `calificacion`, `id_turnos`) VALUES ('$dni3', '$resultadox', '$id_tramites3', '$calificacion', '$id_turnos3');";
	
	$query2 = "DELETE FROM `resultados` WHERE `dni_personas` = 0";
	$resultado1=mysqli_query($conexion,$query1);
	$resultado2=mysqli_query($conexion,$query2);

if ($resultado1) {
  
	
}

	
	
	
 
	



?>

	</center>
</body>
</html>