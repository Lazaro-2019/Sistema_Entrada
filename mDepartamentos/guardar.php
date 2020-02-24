<?php
//se manda llamar la conexion
include("../conexion/conexion.php");
include('../sesiones/verificar_sesion.php');

$departamento    = $_POST["departamento"];

$fecha=date("Y-m-d"); 
$hora=date ("H:i:s");

mysql_query("SET NAMES utf8");
 $insertar = mysql_query("INSERT INTO departamentos 
 								(
 								departamento,
								id_registro,
 								fecha_registro,
 								hora_registro,
 								activo
 								)
							VALUES
								(
 								'$departamento',
 								'1',
 								'$fecha',
 								'$hora',
 								'1'
								)
							",$conexion)or die(mysql_error());

?>