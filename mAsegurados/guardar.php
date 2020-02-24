<?php
//se manda llamar la conexion
include("../conexion/conexion.php");
include('../sesiones/verificar_sesion.php');

$nssocial = $_POST["nssocial"];
$nombreCompleto = $_POST["nombreCompleto"];
$nombre = $_POST["nombre"];
$paterno = $_POST["paterno"];
$materno = $_POST["materno"];
$ciudad = $_POST["ciudad"];
$direccion = $_POST["direccion"];
$sexo = $_POST["sexo"];
$telefono = $_POST["telefono"];
$fecha_nac = $_POST["fecha_nac"];
$correo = $_POST["correo"];


$fecha=date("Y-m-d"); 
$hora=date ("H:i:s");

mysql_query("SET NAMES utf8");
 $insertar = mysql_query("INSERT INTO asegurados 
 								(
 								nssocial,
 								nombre_asegurado,
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
 								'$nssocial',
 								'$nombreCompleto',
								'$nombre',
 								'$paterno',
								'$materno',
								'$ciudad',
								'$sexo',
								'$direccion',
								'$telefono',
								'$fecha_nac',
								'$correo',
								'1',
								'$fecha',
								'$hora',
								'1'
								)
							",$conexion)or die(mysql_error());

mysql_free_result($insertar);
mysql_close($conexion);
?>