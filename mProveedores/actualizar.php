<?php
//se manda llamar la conexion
include("../conexion/conexion.php");
include('../sesiones/verificar_sesion.php');

$proveedorE    = $_POST["proveedorE"];
$claveE    = $_POST["claveE"];
$ide       = $_POST["ide"];

$fecha=date("Y-m-d"); 
$hora=date ("H:i:s");

mysql_query("SET NAMES utf8");
 $insertar = mysql_query("UPDATE proveedores SET
							cveProveedor='$claveE',
							proveedor='$proveedorE',
							fecha_registro='$fecha',
							hora_registro='$hora'
						WHERE id_proveedor='$ide'
							 ",$conexion)or die(mysql_error());

?>