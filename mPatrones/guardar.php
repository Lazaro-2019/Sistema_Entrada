<?php
//se manda llamar la conexion
include("../conexion/conexion.php");
include('../sesiones/verificar_sesion.php');

$nregpatronal = $_POST["nregpatronal"];
$nombreCompletoP = $_POST["nombreCompletoP"];
$nombreP = $_POST["nombreP"];
$paternoP = $_POST["paternoP"];
$maternoP = $_POST["maternoP"];
$ciudadP = $_POST["ciudadP"];
$direccionP = $_POST["direccionP"];
$sexoP = $_POST["sexoP"];
$telefonoP = $_POST["telefonoP"];
$fecha_nacP = $_POST["fecha_nacP"];
$correoP = $_POST["correoP"];


$fecha=date("Y-m-d"); 
$hora=date ("H:i:s");

mysql_query("SET NAMES utf8");
 $insertar = mysql_query("INSERT INTO patrones 
 								(
 								NRegPatronal,
 								nombre_patron,
								nombre,
 								ap_paterno,
 								ap_materno,
 								ciudad_procedencia,
 								sexo,
 								direccion,
								telefono,
								fecha_nacimiento,
								correo,
								id_registro,
								fecha_registro,
								hora_registro,
								activo
 								)
							VALUES
								(
 								'$nregpatronal',
 								'$nombreCompletoP',
								'$nombreP',
 								'$paternoP',
								'$maternoP',
								'$ciudadP',
								'$sexoP',
								'$direccionP',
								'$telefonoP',
								'$fecha_nacP',
								'$correoP',
								'1',
								'$fecha',
								'$hora',
								'1'
								)
							",$conexion)or die(mysql_error());

mysql_free_result($insertar);
mysql_close($conexion);
?>