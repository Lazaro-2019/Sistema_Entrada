<?php
//se manda llamar la conexion
include("../conexion/conexion.php");
include('../sesiones/verificar_sesion.php');

$proveedor    = $_POST["proveedor"];
$clave    = $_POST["clave"];

$fecha=date("Y-m-d"); 
$hora=date ("H:i:s");

mysql_query("SET NAMES utf8");
 $insertar = mysql_query("INSERT INTO proveedores 
 								(
								cveProveedor,
 								proveedor,
								id_registro,
 								fecha_registro,
 								hora_registro,
 								activo
 								)
							VALUES
								(
								'$clave',
 								'$proveedor',
 								'1',
 								'$fecha',
 								'$hora',
 								'1'
								)
							",$conexion)or die(mysql_error());

?>