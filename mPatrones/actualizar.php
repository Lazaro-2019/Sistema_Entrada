<?php
//se manda llamar la conexion
include("../conexion/conexion.php");
include('../sesiones/verificar_sesion.php');

//RECIBE VARIABLES AJAX
$idEP = $_POST["idEP"];
$nregpatronalE = $_POST["nregpatronalE"];
$nombreCompletoPE = $_POST["nombreCompletoPE"];
$nombrePE = $_POST["nombrePE"];
$paternoPE = $_POST["paternoPE"];
$maternoPE = $_POST["maternoPE"];
$ciudadPE = $_POST["ciudadPE"];
$direccionPE = $_POST["direccionPE"];
$sexoPE = $_POST["sexoPE"];
$telefonoPE = $_POST["telefonoPE"];
$fecha_nacPE = $_POST["fecha_nacPE"];
$correoPE = $_POST["correoPE"];

$fecha=date("Y-m-d"); 
$hora=date ("H:i:s");

		mysql_query("SET NAMES utf8");
		$actualizar = mysql_query("UPDATE patrones SET  
									NRegPatronal='$nregpatronalE',
									nombre_patron='$nombreCompletoPE',
									nombre='$nombrePE',
									ap_paterno='$paternoPE',
									ap_materno='$paternoPE',
									ciudad_procedencia='$ciudadPE',
									sexo='$sexoPE',
									direccion='$direccionPE',
									telefono='$telefonoPE',
									fecha_nacimiento='$fecha_nacPE',
									correo='$correoPE',
									fecha_registro='$fecha',
									hora_registro='$hora'
									
									WHERE id_patron='$idEP'
								",$conexion)or die(mysql_error());
?>