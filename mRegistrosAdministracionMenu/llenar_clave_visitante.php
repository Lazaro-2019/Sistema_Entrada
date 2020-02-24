<?php
include("../conexion/conexion.php");

$visitante= $_POST["visitante"];

mysql_query("SET NAMES utf8");

$consulta = mysql_query("SELECT
							cveVisitante							
						FROM
							visitantes WHERE id_visitante='$visitante'",$conexion)or die(mysql_error());
$row=mysql_fetch_row($consulta);

$clave=$row[0];

echo "$clave";
?>
