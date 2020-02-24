<?php
//se manda llamar la conexion
include("../conexion/conexion.php");
include('../sesiones/verificar_sesion.php');

$nombre    = $_POST["nombre"];
$pertenece   = $_POST["perteneceE"];
$departamento   = $_POST["departamentoE"];
$idE       = $_POST["idE"];

$fecha=date("Y-m-d"); 
$hora=date ("H:i:s");

mysql_query("SET NAMES utf8");
 $insertar = mysql_query("UPDATE tramites SET
							tramite='$nombre',
							id_departamento='$departamento',
							pertenece='$pertenece',
							fecha_registro='$fecha',
							hora_registro='$hora',
							id_registro='1'
						WHERE id_tramite='$idE'
							 ",$conexion)or die(mysql_error());
?>