<?php
	require ('conexion.php');
	
	$query = "SELECT id_barrio, barrio FROM barrios ORDER BY barrio";
	$resultado=$mysqli->query($query);

	

?>





<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Nueva Persona</title>
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
		<h1> <font color="white">Ingrese nueva persona </font><h1>
<font color="white">
	 <form action="registro_persona.php" method="POST">
	 	<input name="dni" type="dni" placeholder="Ingrese DNI">
      <input name="nombre" type="nombre" placeholder="Ingrese Nombre"> 
      <input name="apellido" type="apellido" placeholder="Ingrese Apellido"> 
      <input name="edad" type="edad" placeholder="Ingrese Edad"> 
      <select name="cbx_barrio" id="cbx_barrio">
      	<option value="0">Seleccione Barrio</option>
      	<?php 
      	WHILE ($row = $resultado -> fetch_assoc())	{ ?>
      		<option value="<?php echo $row['id_barrio']; ?>"><?php echo $row['barrio']; ?></option>

      	<?php } ?>

      	
      </select> <br> <br>

      <select name="cbx_sexo" id="cbx_sexo">
      		<option value="Masculino">Masculino</option>
      		<option value="Femenino">Femenino</option>
		</select>
		<br> <br>
	<input type="submit" value="Aceptar"> 
    </form>

<h2>No se ha cargado</h2>
</font>



	</center>

	
	
</body>
</html>