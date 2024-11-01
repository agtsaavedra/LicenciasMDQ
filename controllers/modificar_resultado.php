<?php 
require ('conexion.php');
error_reporting(0);
$query2 = "SELECT id_tramites, tramite FROM tramites ORDER BY tramite";
$resultado2=$mysqli->query($query2);



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
	<center>
		<h1> <font color="white">Datos para modificar resultado</font><h1>
<font color="white">
	 <form action="modificar_resultado.php" method="POST">
	 	<input name="dni" type="dni" placeholder="Ingrese DNI">
	 Ingrese la fecha <input name="fecha1" type="date" placeholder="Ingrese fecha"> <br> <br>
	    
	 	<select name="cbx_tramite" id="cbx_tramite">
	    <option value="0">Seleccione Tramite</option>
      	<?php 
      	WHILE ($row = $resultado2 -> fetch_assoc())	{ ?>
      		<option value="<?php echo $row['id_tramites']; ?>"><?php echo $row['tramite']; ?></option>

      	<?php } ?>       	
      	</select>

      	<br>
     <input type="submit" value="Aceptar"> 
    </form>



<?php 
require ('conexion.php');

$dni=$_POST["dni"];
$fecha=$_POST["fecha1"];
$tramite=$_POST["cbx_tramite"];


	$query = "SELECT tu.id_turnos, tu.fecha, tu.dni_personas as dni ,p.nombre, p.apellido, te.tramite, te.id_tramites as id_tramites, r.id_resultados FROM turnos tu INNER JOIN personas p ON p.dni_personas = tu.dni_personas INNER JOIN tramites te ON te.id_tramites = tu.id_tramite INNER JOIN resultados r ON r.dni_personas = tu.dni_personas WHERE tu.fecha = '$fecha' AND te.id_tramites = $tramite AND tu.dni_personas = '$dni'";
	
	$resultado=$mysqli->query($query);

WHILE ($row = $resultado -> fetch_assoc())	{

	$id_resultados = $row['id_resultados'];
	echo "<font color='white' size='2'>";
	echo $row['nombre'];
	echo "<br>";
	echo $row['apellido'];
	echo "<br>";
	echo $row['dni'];
	echo "<br>";
	echo $row['fecha'];
	echo "<br>";
	echo $row['tramite'];
	echo "<br>";
	echo "</font>";
	
	}

?>

<center>
		<h1> <font color="white" size="6">Ingrese nuevos resultados</font><h1>
<font color="white">
	 <form action="modificar_resultado_proceso.php" method="POST">
	 	<input type="hidden" name="id_resultados" value="<?php echo $id_resultados; ?>">
	 	

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
      	</select> <br> 

      <select name="cbx_resultado" id="cbx_resultado">
      		<option value="0">Seleccione Resultado</option>
      		<option value="Aprobado">Aprobado</option>
      		<option value="Desaprobado">Desaprobado</option>
		</select>
		<br> 
	<input type="submit" value="Aceptar"> 
    </form>
</font>




</body>
</html>