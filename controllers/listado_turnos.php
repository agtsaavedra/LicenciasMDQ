<?php

$conexion = mysqli_connect("localhost","root","");
mysqli_select_db($conexion,"licencias") or die("ERROR AL CONENCTARSE");
mysqli_set_charset($conexion,"utf8");

$sql1 = "SELECT nombre, apellido, fecha, turnos.dni_personas AS dni, tramite FROM turnos, tramites, personas WHERE turnos.id_tramite = tramites.id_tramites AND personas.dni_personas = turnos.dni_personas AND DAY(fecha)=DAY(CURDATE()) AND MONTH(fecha)=MONTH(CURDATE()) ORDER BY tramite";

$resultado5=mysqli_query($conexion,$sql1);

if(!$resultado5){
				echo'hay un error en la sentencia de sql: '.$sql;
			}else{
	
				$listado_tramites = mysqli_fetch_array($resultado5);
			}


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
<table border="6" height="200px" valign="top">
			<tr>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Fecha</th>
				<th>DNI</th>
				<th>Tramite</th>
				<?php
					for($i=0; $i<$listado_tramites; $i++){
						echo"<tr>";
							echo"<td>";
								echo$listado_tramites['nombre'];
							echo"</td>";
							
							echo"<td>";
								echo$listado_tramites['apellido'];
							echo"</td>";
							echo"<td>";
								echo$listado_tramites['fecha'];
							echo"</td>";
							echo"<td>";
								echo$listado_tramites['dni'];
							echo"</td>";
							echo"<td>";
								echo$listado_tramites['tramite'];
							echo"</td>";
							echo"</tr>";
						
						$listado_tramites = mysqli_fetch_array($resultado5);	
					}
				?>
			</tr>
		</table>
</center>


</body>
</html>