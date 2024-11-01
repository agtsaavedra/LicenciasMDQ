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
		<h1> <font color="white">Ingrese fecha para agregar resultados </font><h1>
<font color="white">
	 <form action="registro_resultado.php" method="POST">
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


</font>

<?php  


$tramite = $_POST['cbx_tramite'];
$dia = $_POST['fecha1'];
$sql1 = "SELECT tu.id_turnos, tu.fecha, tu.dni_personas as dni ,p.nombre, p.apellido, te.tramite, te.id_tramites as id_tramites FROM turnos tu INNER JOIN personas p ON p.dni_personas = tu.dni_personas INNER JOIN tramites te ON te.id_tramites = tu.id_tramite WHERE tu.fecha = '$dia' AND te.id_tramites = $tramite";

$resultado5=$mysqli->query($sql1);

if(!$resultado5){
				
			}else{
	
				$listado_tramites = mysqli_fetch_array($resultado5);
			}

?>


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
							?>
							<td>
								<form action="guardar_resultado.php" method="POST">
									<input type="hidden" name="id_tramites" value="<?php echo $listado_tramites['id_tramites']; ?>">
									<input type="hidden" name="id_turnos" value="<?php echo $listado_tramites['id_turnos']; ?>">
									<input type="hidden" name="dni" value="<?php echo $listado_tramites['dni']; ?>">
									<input type="submit" value="Agregar Resultado">
								</form>
							</td>
							
			<?php	$listado_tramites = mysqli_fetch_array($resultado5);  } ?>
			


			</tr>
		</table>
</center>



</body>
</html>