<?php 
$conexion = mysqli_connect("localhost","root","");
mysqli_select_db($conexion,"licencias") or die("ERROR AL CONENCTARSE");
mysqli_set_charset($conexion,"utf8"); 
error_reporting(0);
	

	require ('conexion.php');
	//Consulta Tramites
	$query2 = "SELECT id_tramites, tramite FROM tramites ORDER BY tramite";
	$resultado2=$mysqli->query($query2);

	$query3 = "SELECT id_lugares, lugar, direccion FROM lugares ORDER BY lugar";
	$resultado3=$mysqli->query($query3);

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
	<form action="nuevo_turno.php" method="POST">
      <input name="dni" type="dni" placeholder="Ingrese DNI"> 
      <input type="submit" value="Aceptar"> 
    </form>

    <?php 

	require ('conexion.php');
	$dni= $_POST["dni"];
	$query = "SELECT * FROM `personas` WHERE dni_personas = $dni";
	$resultado=$mysqli->query($query);



	WHILE ($row = $resultado -> fetch_assoc())	{
	echo "<font color='white'>";
	echo $row['nombre'];
	echo "<br>";
	echo $row['apellido'];
	echo "</font>";
	echo "<br>";
}

 ?>



	</center>
<center>
<font color="white">
	Ha fallado el registro del turno
	 <form action="registro_turno.php" method="POST">
	 	<input type="hidden" name="dni1" value="<?php WHILE ($row = $resultado -> fetch_assoc()) {echo $row['dni'];}   ?>" >
      Ingrese la fecha <input name="fecha" type="date" placeholder="Ingrese fecha"> <br> <br>
		<select name="cbx_tramite" id="cbx_tramite">
      	<option value="0">Seleccione Tramite</option>
      	<?php 
      	WHILE ($row = $resultado2 -> fetch_assoc())	{ ?>
      		<option value="<?php echo $row['id_tramites']; ?>"><?php echo $row['tramite']; ?></option>

      	<?php } ?>
      </select> <br> <br>

         <select name="cbx_lugar" id="cbx_lugares">
      	<option value="0">Seleccione Lugar</option>
      	<?php 
      	WHILE ($row = $resultado3 -> fetch_assoc())	{ ?>
      		<option value="<?php echo $row['id_lugares']; ?>"><?php echo $row['lugar']; ?></option>

      	<?php } ?>
      </select> <br> <br>
		<br> <br>
	<input type="submit" value="Aceptar"> 
    </form>


</font>
</center>
</body>
</html>