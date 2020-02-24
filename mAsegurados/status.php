<?php
//se manda llamar la conexion
include("../conexion/conexion.php");
include('../sesiones/verificar_sesion.php');

//RECIBE VARIABLES AJAX
$id_asegurado = $_POST["id_aseguradoU"];

$fecha =date("Y-m-d"); 
$hora  =date ("H:i:s");
mysql_query("SET NAMES utf8");


	 $eliminar = mysql_query("DELETE FROM asegurados
									WHERE id_asegurado='$id_asegurado'
							",$conexion)or die(mysql_error());

$valor2="Borrado";

echo json_encode($valor2);
?>