<?php
//se manda llamar la conexion
include("../conexion/conexion.php");

$nombre    = $_POST["nombre"];
$pertenece   = $_POST["pertenece"];
$departamento   = $_POST["departamento"];

$fecha=date("Y-m-d"); 
$hora=date ("H:i:s");

mysql_query("SET NAMES utf8");
 $insertar = mysql_query("INSERT INTO tramites 
 								(
 								tramite,
 								id_departamento,
 								pertenece,
 								id_registro,
 								fecha_registro,
 								hora_registro,
 								activo
 								)
							VALUES
								(
 								'$nombre',
 								'$departamento',
 								'$pertenece',
 								'1',
 								'$fecha',
 								'$hora',
 								'1'
								)
							",$conexion)or die(mysql_error());

?>