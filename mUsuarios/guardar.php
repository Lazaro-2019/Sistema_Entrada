<?php
	//se manda llamar la conexion
	include("../conexion/conexion.php");
	include('../sesiones/verificar_sesion.php');

	$idPersona = $_POST["idPersona"];
	$usuario   = $_POST["usuario"];
	$contra    = $_POST["contra"];
	$tipo	   = $_POST["tipo"];


	$contraMD5=md5($contra);

	$idPersona = trim($idPersona);
	$usuario   = trim($usuario);
	// $contra    = trim($contra);

	$fecha=date("Y-m-d"); 
	$hora=date ("H:i:s");

	mysql_query("SET NAMES utf8");
		$insertar = mysql_query("INSERT INTO usuarios 
											(
											id_persona,
											usuario,
											contra,
											id_registro,
											pvez,
											fecha_registro,
											hora_registro,
											tipo_usuario,
											activo
											)
										VALUES
											(
											'$idPersona',
											'$usuario',
											'$contraMD5',
											'1',
											'1',
											'$fecha',
											'$hora',
											'$tipo',
											'1'
											)
										",$conexion)or die(mysql_error());
?>