<?php
	//se manda llamar la conexion
	include("../conexion/conexion.php");
	include('../sesiones/verificar_sesion.php');

	$nombre    = $_POST["nombre"];
	$paterno   = $_POST["paterno"];
	$materno   = $_POST["materno"];
	$direccion = $_POST["direccion"];
	$sexo      = $_POST["sexo"];
	$telefono  = $_POST["telefono"];
	$fecha_nac = $_POST["fecha_nac"];
	$correo    = $_POST["correo"];


	// $nombre    =trim($nombre);
	// $paterno   =trim($paterno);
	// $materno   =trim($materno);
	// $direccion =trim($direccion);
	// $telefono  =trim($telefono);
	// $correo    =trim($correo);
	// $sexo      =trim($sexo);
	// $fecha_nac =trim($fecha_nac);

	$fecha=date("Y-m-d"); 
	$hora=date ("H:i:s");

	mysql_query("SET NAMES utf8");
	$insertar = mysql_query("INSERT INTO personas 
										(
										nombre,
										ap_paterno,
										ap_materno,
										sexo,
										direccion,
										telefono,
										fecha_nacimiento,
										correo,
										id_registro,
										fecha_registro,
										hora_registro,
										activo
										)
									VALUES
										(
										'$nombre',
										'$paterno',
										'$materno',
										'$sexo',
										'$direccion',
										'$telefono',
										'$fecha_nac',
										'$correo',
										'1',
										'$fecha',
										'$hora',
										'1'
										)
									",$conexion)or die(mysql_error());
?>