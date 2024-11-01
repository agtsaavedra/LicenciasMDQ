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
	<form action="modificar_persona.php" method="POST">
      <input name="dni" type="dni" placeholder="Ingrese DNI"> 
      <input type="submit" value="Aceptar"> 
    </form>



<?php 
	error_reporting(0);
	require ('conexion.php');
	$dni= $_POST["dni"];
	$query = "SELECT p.nombre, p.apellido, p.fecha_nac, p.sexo, p.id_barrio, b.barrio, p.dni_personas FROM personas p INNER JOIN barrios b ON b.id_barrio = p.id_barrio WHERE p.dni_personas = $dni";
	$resultado=$mysqli->query($query);
	

	$query1 = "SELECT id_barrio, barrio FROM barrios ORDER BY barrio";
	$resultado1=$mysqli->query($query1);

	WHILE ($row = $resultado -> fetch_assoc())	{

	$dni_final = $row['dni_personas'];
	$nombre = $row['nombre'];
	$apellido = $row['apellido'];
	$edad = $row['fecha_nac'];
	$barrio = $row['barrio'];
	$id_barrio = $row['id_barrio'];
	}




 ?>
	<center>
		<h1> <font color="white">Modifique los campos </font><h1>
<font color="white">
	 <form action="modificar_persona_proceso.php" method="POST">
	 <input type="hidden" name="dni1" value="<?php echo $dni_final; ?>">	
	 <input name="dni" type="dni" placeholder="<?php echo"$dni_final";?>">
      <input name="nombre" type="nombre" placeholder="<?php echo"$nombre";?>"> 
      <input name="apellido" type="apellido" placeholder="<?php echo"$apellido";?>"> 
      <font color="white" size="3">Ingrese la fecha de nacimiento nuevamente</font> <br> <input name="fecha" type="date" placeholder="Ingrese fecha"> <br> <br>
      <select name="cbx_barrio" id="cbx_barrio">
      	<option value="<?php echo"$id_barrio";?>"><?php echo"$barrio";?></option>
      	<?php 
      	WHILE ($row1 = $resultado1 -> fetch_assoc())	{ ?>
      		<option value="<?php echo $row1['id_barrio']; ?>"><?php echo $row1['barrio']; ?></option>

      	<?php } ?>

      	
      </select> <br> <br>

      <select name="cbx_sexo" id="cbx_sexo">
      		<option value="Masculino">Masculino</option>
      		<option value="Femenino">Femenino</option>
		</select>
		<br> <br>
	<input type="submit" value="Aceptar"> 
    </form>


</font>



	</center>

</body>
</html>