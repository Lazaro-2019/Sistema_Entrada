<?php
//se manda llamar la conexion
include("../conexion/conexion.php");
include('../sesiones/verificar_sesion.php');
//RECIBE VARIABLES AJAX
$idE = $_POST["idE"];
$nssocialE = $_POST["nssocialE"];
$nombreCompletoE = $_POST["nombreCompletoE"];
$nombreE = $_POST["nombreE"];
$paternoE = $_POST["paternoE"];
$maternoE = $_POST["maternoE"];
$ciudadE = $_POST["ciudadE"];
$direccionE = $_POST["direccionE"];
$sexoE = $_POST["sexoE"];
$telefonoE = $_POST["telefonoE"];
$fecha_nacE = $_POST["fecha_nacE"];
$correoE = $_POST["correoE"];

$fecha=date("Y-m-d"); 
$hora=date ("H:i:s");

		mysql_query("SET NAMES utf8");
		$actualizar = mysql_query("UPDATE asegurados SET  
									nssocial='$nssocialE',
									nombre_asegurado='$nombreCompletoE',
									nombre='$nombreE',
									ap_paterno='$paternoE',
									ap_materno='$maternoE',
									ciudad_procedencia='$ciudadE',
									direccion='$direccionE',
									sexo='$sexoE',
									telefono='$telefonoE',
									fecha_nacimiento='$fecha_nacE',
									correo='$correoE',
									fecha_registro='$fecha',
									hora_registro='$hora'
									
									WHERE id_asegurado='$idE'
								",$conexion)or die(mysql_error());
?>