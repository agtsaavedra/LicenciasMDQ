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
						
						<li><a href="cantidad_resultado_diario.php">Consultar Resultado Diario Tramite</a></li>

					</ul>
				</li>


					<li><a href="#">Estadisticas</a>
					<ul class="submenu">
						<li><a href="cantidad_turnos_barrio.php">Turnos por Barrio</a></li>
						<li><a href="listado_resultado_barrio.php">Aprobados / Desaprobados por barrio</a></li>
						<li><a href="listado_resultado2_tramite.php">Aprobados / Desaprobados por tramite</a></li>
					</ul>
				</li>

					<li class="item_r"><a href="login.php">Cerrar Sesion</a></li>


			</ul>
		</nav>
	</header>
	

	<center>
		<h1> <font color="white">Ingrese fecha y tramite que desea consultar </font><h1>
<font color="white">
	 <form action="consulta_resultado.php" method="POST">
	 <input name="fecha1" type="date" placeholder="Ingrese fecha"> <br> <br>
	    
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
$tramite =$_POST["cbx_tramite"];
$fecha = $_POST["fecha1"];

$query1 = "SELECT p.nombre, p.apellido, r.calificacion, r.resultado, t.dni_personas, tr.tramite FROM turnos t INNER JOIN tramites tr on tr.id_tramites = t.id_tramite INNER JOIN resultados r ON r.dni_personas = t.dni_personas INNER JOIN personas p ON p.dni_personas = t.dni_personas WHERE t.fecha='$fecha' AND t.id_tramite = $tramite ";


$resultado1=$mysqli->query($query1);



$listado_resultado = mysqli_fetch_array($resultado1);

 ?>
<center>
<table border="6" height="200px" valign="top">
			<tr>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Calificacion</th>
				<th>Resultado</th>
				<th>Tramite</th>
				<?php
					for($i=0; $i<$listado_resultado; $i++){
						echo"<tr>";
							echo"<td>";
								echo$listado_resultado['nombre'];
							echo"</td>";
							
							echo"<td>";
								echo$listado_resultado['apellido'];
							echo"</td>";
							echo"<td>";
								echo$listado_resultado['calificacion'];
							echo"</td>";
							echo"<td>";
								echo$listado_resultado['resultado'];
							echo"</td>";
							echo"<td>";
								echo$listado_resultado['tramite'];
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