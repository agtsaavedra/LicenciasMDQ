<?php
$conexion = mysqli_connect("localhost","root","");
mysqli_select_db($conexion,"licencias") or die("ERROR AL CONENCTARSE");
mysqli_set_charset($conexion,"utf8");


$dni= $_POST["dni"];
$nombre= $_POST["nombre"];
$apellido= $_POST["apellido"];
$fechanacimiento= $_POST["fecha"];
$sexo= $_POST["cbx_sexo"];
$barrio= $_POST["cbx_barrio"];


$consulta = "INSERT INTO `personas` (`nombre`, `apellido`, `sexo`, `fecha_nac`, `id_barrio`, `dni_personas`) VALUES ('$nombre', '$apellido', '$sexo', '$fechanacimiento', '$barrio', '$dni');";

$resultado1=mysqli_query($conexion,$consulta);

if ($resultado1) {

	header("location: registro_persona_correcto.php");
}else{header("location: registro_persona_fallido.php");}

?>