<?php
//se manda llamar la conexion
include("../conexion/conexion.php");
include('../sesiones/verificar_sesion.php');

$municipio    = $_POST["municipio"];

$fecha=date("Y-m-d"); 
$hora=date ("H:i:s");

mysql_query("SET NAMES utf8");
 $insertar = mysql_query("INSERT INTO municipios 
 								(
								municipio,
								id_registro,
 								fecha_registro,
 								hora_registro,
 								activo
 								)
							VALUES
								(
 								'$municipio',
 								'1',
 								'$fecha',
 								'$hora',
 								'1'
								)
							",$conexion)or die(mysql_error());

?>