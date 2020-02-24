<?php
//se manda llamar la conexion
include("../conexion/conexion.php");
include('../sesiones/verificar_sesion.php');

$nombreE    = $_POST["nombreE"];
$ide       = $_POST["ide"];

$fecha=date("Y-m-d"); 
$hora=date ("H:i:s");

mysql_query("SET NAMES utf8");
 $insertar = mysql_query("UPDATE departamentos SET
							departamento='$nombreE',
							fecha_registro='$fecha',
							hora_registro='$hora'
						WHERE id_departamento='$ide'
							 ",$conexion)or die(mysql_error());

?>