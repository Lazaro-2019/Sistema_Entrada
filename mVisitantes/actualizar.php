<?php
//se manda llamar la conexion
include("../conexion/conexion.php");
include('../sesiones/verificar_sesion.php');

$visitanteE    = $_POST["visitanteE"];
$claveE    = $_POST["claveE"];
$ide       = $_POST["ide"];

$fecha=date("Y-m-d"); 
$hora=date ("H:i:s");

mysql_query("SET NAMES utf8");
 $insertar = mysql_query("UPDATE visitantes SET
							cveVisitante='$claveE',
							visitante='$visitanteE',
							fecha_registro='$fecha',
							hora_registro='$hora'
						WHERE id_visitante='$ide'
							 ",$conexion)or die(mysql_error());

?>