<?php
//se manda llamar la conexion
include("../conexion/conexion.php");
include('../sesiones/verificar_sesion.php');

$id_patron= $_POST["id_patron"];
$regPatronal= $_POST["regPatronal"];
$nombre_patron= $_POST["nombre_patron"];
$ciudad= $_POST["ciudad"];
$departamento= $_POST["departamento"];
$tramite= $_POST["tramite"];
$encuesta= $_POST["encuesta"];

$fecha   = date("Y-m-d"); 
$hora    = date ("H:i:s");
//1-CONSULTA QUE EXISTA LA MATRICULA QUE INTRODUCES
//CONSULTA
	$consulta=mysql_query("SELECT
								id_patron,
								nregpatronal,
								nombre_patron									
							FROM
									patrones
							WHERE nregpatronal ='$regPatronal'"
							,$conexion) or die (mysql_error());
	$row             =mysql_fetch_row($consulta);
	$contador        =mysql_num_rows($consulta);

//RESPUESTA
/*variables para insert*/
$idPatron = $row[0];

//ENCUENTRA UNA MATRICULA
if ($contador!=0){
	//SI ENCONTRO EL ALUMNO Y VA A CHECAR SI ES UNA ENTRADA O UNA SALIDA
	$consulta2=mysql_query("SELECT 
							registropatrones.id_registro,
							registropatrones.id_patron,
							registropatrones.nregpatronal,
							registropatrones.fecha_ingreso,
							registropatrones.hora_ingreso,
							registropatrones.fecha_salida,
							registropatrones.hora_salida
							FROM 
							registropatrones 
							INNER JOIN patrones on patrones.id_patron=registropatrones.id_patron
							WHERE patrones.NRegPatronal='$regPatronal' and patrones.activo='1'  and fecha_ingreso='$fecha' and hora_salida is NULL
							",$conexion) or die (mysql_error());

	$rowSalidasNulas	=mysql_fetch_row($consulta2);
	$contador2        =mysql_num_rows($consulta2);				
	$idRegistro=$rowSalidasNulas[0];


	if ($contador2!=0) {
		//SALIDA UPDATE
		$update=mysql_query("UPDATE registropatrones SET 
							fecha_salida='$fecha',
							hora_salida='$hora',
							encuesta='$encuesta'
							WHERE id_registro='$idRegistro'
							",$conexion) or die (mysql_error());
		$ES="Salida";
		$mje="Se ha registrado la salida";
	}else{
		//ENTRADA INSERT
		$insertar = mysql_query("INSERT INTO registropatrones
 								(
 								id_patron,
 								nregpatronal,
								departamento,
								tramite,
								ciudad,
 								fecha_ingreso,
 								hora_ingreso,
								activo
 								)
							VALUES
								(
								'$idPatron',
 								'$regPatronal',
								'$departamento',
								'$tramite',
								'$ciudad',
 								'$fecha',
 								'$hora',
								'1'
								)
				
						",$conexion)or die(mysql_error());
		//variables
		$ES="Entrada";
		$mje="Se ha registrado la entrada";
		//$contador=1;
	}

//$contador=1;
}else{
//NO ENCONTRO MATRICULA
    $contador=0;
}



$nombre=$row[4]." ".$row[5]." ".$row[6];
$carrera=$row[7];
echo "$ES,$mje,$nombre";
				
 ?>


