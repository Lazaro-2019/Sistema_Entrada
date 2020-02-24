<?php
//se manda llamar la conexion
include("../conexion/conexion.php");
include('../sesiones/verificar_sesion.php');

$municipioE    = $_POST["municipioE"];
$ide       = $_POST["ide"];

$fecha=date("Y-m-d"); 
$hora=date ("H:i:s");

mysql_query("SET NAMES utf8");
 $insertar = mysql_query("UPDATE municipios SET
							municipio='$municipioE',
							fecha_registro='$fecha',
							hora_registro='$hora'
						WHERE id_municipio='$ide'
							 ",$conexion)or die(mysql_error());

?>