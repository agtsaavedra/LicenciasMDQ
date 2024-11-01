<?php 
$conexion = mysqli_connect("localhost","root","");
mysqli_select_db($conexion,"licencias") or die("ERROR AL CONENCTARSE");
mysqli_set_charset($conexion,"utf8");

$fecha = $_POST["fecha"];
$dni = $_POST["dni1"];
$tramite= $_POST["cbx_tramite"];
$lugar= $_POST["cbx_lugar"];

$consulta5 = "INSERT INTO `turnos` (`dni_personas`, `id_tramite`, `fecha`, `id_lugares`) VALUES ('$dni', '$tramite', '$fecha', '$lugar');";

$resultado5=mysqli_query($conexion,$consulta5);

if ($resultado5) {

	header("location: registro_turno_correcto.php");;
}else{header("location: registro_turno_fallido.php");}

 ?>
