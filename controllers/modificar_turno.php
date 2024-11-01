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
	<form action="modificar_turno.php" method="POST">
      <input name="dni" type="dni" placeholder="Ingrese DNI">
     <font color="white">Ingrese la fecha</font>  <input name="fecha2" type="date" placeholder="Ingrese fecha"> <br> <br> 
      		<select name="cbx_tramite2" id="cbx_tramite2">
      	<option value="0">Seleccione Tramite</option>
      	<?php
      	require ('conexion.php'); 
    $query5 = "SELECT id_tramites, tramite FROM tramites ORDER BY tramite";
	$resultado5=$mysqli->query($query5);
		WHILE ($row = $resultado5 -> fetch_assoc())	{ ?>
      		<option value="<?php echo $row['id_tramites']; ?>"><?php echo $row['tramite']; ?></option>

      	<?php } ?>
      </select> <br> <br>
      <input type="submit" value="Aceptar"> 
    </form>


<?php 
	error_reporting(0);
	
	$dni= $_POST["dni"];
	$fecha2=$_POST["fecha2"];
	$tramite2=$_POST["cbx_tramite2"];
	$query = "SELECT t.id_turnos, p.nombre, p.apellido , t.fecha , p.dni_personas , l.lugar, te.tramite FROM turnos t INNER JOIN personas p ON p.dni_personas = t.dni_personas INNER JOIN tramites te ON t.id_tramite = te.id_tramites INNER JOIN lugares l ON l.id_lugares = t.id_lugares WHERE t.dni_personas = $dni AND t.fecha = '$fecha2'AND te.id_tramites = $tramite2";
	


	$resultado1=$mysqli->query($query);



	WHILE ($row = $resultado1 -> fetch_assoc())	{

	$id_turnos = $row['id_turnos'];
	echo "<font color='white'>";
	echo $row['nombre'];
	echo "<br>";
	echo $row['apellido'];
	echo "<br>";
	echo $row['dni_personas'];
	echo "<br>";
	echo $row['fecha'];
	echo "<br>";
	echo $row['tramite'];
	echo "<br>";
	echo $row['lugar'];

	echo "</font>";
	
	}




 ?>
</center>
<center>
<font color="white">
	 <form action="modificar_turno_proceso.php" method="POST">
	 	<input type="hidden" name="id_turnos" value="<?php echo $id_turnos; ?>">
	 	Ingrese la fecha <input name="fecha" type="date" placeholder="Ingrese fecha"> <br> <br>
		<select name="cbx_tramite" id="cbx_tramite">
      	<option value="0">Seleccione Tramite</option>
      	<?php 
      	$query6 = "SELECT id_tramites, tramite FROM tramites ORDER BY tramite";
	$resultado6=$mysqli->query($query6);

      	WHILE ($row = $resultado6 -> fetch_assoc())	{ ?>
      		<option value="<?php echo $row['id_tramites']; ?>"><?php echo $row['tramite']; ?></option>

      	<?php } ?>
      </select> <br> <br>

         <select name="cbx_lugar" id="cbx_lugares">
      	<option value="0">Seleccione Lugar</option>
      	<?php 
     $query7 = "SELECT id_lugares, lugar, direccion FROM lugares ORDER BY lugar";
	$resultado7=$mysqli->query($query7);


      	WHILE ($row = $resultado7 -> fetch_assoc())	{ ?>
      		<option value="<?php echo $row['id_lugares']; ?>"><?php echo $row['lugar']; ?></option>

      	<?php } ?>
      </select> <br> <br>
		<br> <br>
	<input type="submit" value="Modificar"> 
    </form>


</body>
</html>