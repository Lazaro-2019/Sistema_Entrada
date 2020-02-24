<?php
	//se manda llamar la conexion
	include("../conexion/conexion.php");
	include('../sesiones/verificar_sesion.php');

	$nombre    = $_POST["nombre"];
	$paterno   = $_POST["paterno"];
	$materno   = $_POST["materno"];
	$direccion = $_POST["direccion"];
	$telefono  = $_POST["telefono"];
	$correo    = $_POST["correo"];
	$fecha_nac = $_POST["fecha_nac"];
	$sexo      = $_POST["sexo"];
	$ide       = $_POST["ide"];

	$fecha=date("Y-m-d"); 
	$hora=date ("H:i:s");

	mysql_query("SET NAMES utf8");
	$insertar = mysql_query("UPDATE personas SET
												nombre='$nombre',
												ap_paterno='$paterno',
												ap_materno='$materno',
												sexo='$sexo',
												direccion='$direccion',
												telefono='$telefono',
												fecha_nacimiento='$fecha_nac',
												correo='$correo',
												id_registro='1',
												fecha_registro='$fecha',
												hora_registro='$hora'

											WHERE id_persona='$ide'
												",$conexion)or die(mysql_error());
?>