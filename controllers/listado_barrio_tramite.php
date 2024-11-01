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
		<h1> <font color="white">Ingrese resultados </font><h1>
<font color="white">
	 <form action="listado_resultado_barrio.php" method="POST">
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

$resultadox= $_POST["cbx_resultado"];


$query1 = "SELECT COUNT(tr.id_tramites) as cantidad, tr.tramite from resultados r INNER JOIN personas p ON p.dni_personas = r.dni_personas INNER JOIN barrios b ON b.id_barrio = p.id_barrio INNER JOIN tramites tr ON tr.id_tramites = r.id_tramites  WHERE r.resultado='$resultadox' GROUP BY tr.tramite";


$resultado1=$mysqli->query($query1);



$listado_resultado = mysqli_fetch_array($resultado1);

 ?>
<center>
<table border="6" height="200px" valign="top">
			<tr>
				<th>Cantidad de <?php echo $resultadox; ?></th>
				<th>Barrio</th>

			<?php
					for($i=0; $i<$listado_resultado; $i++){
						echo"<tr>";
							echo"<td>";
								echo$listado_resultado['cantidad'];
							echo"</td>";
							
							echo"<td>";
								echo$listado_resultado['barrio'];
							echo"</td>";
							echo"</tr>";
						
						$listado_resultado = mysqli_fetch_array($resultado1);	
					}
				?>
			</tr>
		</table>


</font>

</body>
</html>