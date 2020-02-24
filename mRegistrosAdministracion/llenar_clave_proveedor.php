<?php
include("../conexion/conexion.php");

$proveedor= $_POST["proveedor"];

mysql_query("SET NAMES utf8");

$consulta = mysql_query("SELECT
							cveProveedor							
						FROM
							proveedores WHERE id_proveedor='$proveedor'",$conexion)or die(mysql_error());
$row=mysql_fetch_row($consulta);

$clave=$row[0];

echo "$clave";
?>
