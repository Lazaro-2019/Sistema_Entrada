<?php
//se manda llamar la conexion
include("../conexion/conexion.php");
include('../sesiones/verificar_sesion.php');

//RECIBE VARIABLES AJAX
$id_patron = $_POST["id_patronU"];

$fecha =date("Y-m-d"); 
$hora  =date ("H:i:s");
mysql_query("SET NAMES utf8");


	 $eliminar = mysql_query("DELETE FROM patrones
									WHERE id_patron='$id_patron'
							",$conexion)or die(mysql_error());

?>