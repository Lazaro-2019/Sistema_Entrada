<?php
//se manda llamar la conexion
include("../conexion/conexion.php");
// include('../sesiones/verificar_sesion.php');

$id_visitante= $_POST["id_visitante"];
$claveV= $_POST["claveV"];

$ciudadA= $_POST["ciudadA"];
$departamentoA= $_POST["departamentoA"];
$tramiteVI= $_POST["tramiteVI"];
$encuestaA=$_POST["encuestaA"];

$fecha   = date("Y-m-d"); 
$hora    = date ("H:i:s");
//1-CONSULTA QUE EXISTA LA MATRICULA QUE INTRODUCES
//CONSULTA
	$consulta3=mysql_query("SELECT
								id_visitante,
								cveVisitante									
							FROM
									visitantes
							WHERE cveVisitante ='$claveV' AND activo='1'"
							,$conexion) or die (mysql_error());
	$row3             =mysql_fetch_row($consulta3);
	$contador3        =mysql_num_rows($consulta3);

//RESPUESTA
/*variables para insert*/
$idVisitante = $row3[0];

//ENCUENTRA UNA MATRICULA
if ($contador3!=0){
	//SI ENCONTRO EL ALUMNO Y VA A CHECAR SI ES UNA ENTRADA O UNA SALIDA
	$consulta4=mysql_query("SELECT 
							registrovisitantes.id_registro,
							registrovisitantes.id_visitante,
							registrovisitantes.cveVisitante,
							registrovisitantes.fecha_ingreso,
							registrovisitantes.hora_ingreso,
							registrovisitantes.fecha_salida,
							registrovisitantes.hora_salida
							FROM 
							registrovisitantes 
							INNER JOIN visitantes on visitantes.id_visitante=registrovisitantes.id_visitante
							WHERE visitantes.cveVisitante='$claveV' and visitantes.activo='1'  and fecha_ingreso='$fecha' and hora_salida is NULL
							",$conexion) or die (mysql_error());
	$rowSalidasNulas3	=mysql_fetch_row($consulta4);
	$contador4        =mysql_num_rows($consulta4);				
	$idRegistro3=$rowSalidasNulas3[0];

	if ($contador4!=0) {
		//SALIDA UPDATE
		$update=mysql_query("UPDATE registrovisitantes SET 
							fecha_salida='$fecha',
							hora_salida='$hora',
							encuesta='$encuestaA'
							WHERE id_registro='$idRegistro3'
							",$conexion) or die (mysql_error());
		$ES="Salida";
		$mje="Se ha registrado la salida";
	}else{
		//ENTRADA INSERT
		$insertar = mysql_query("INSERT INTO registrovisitantes
 								(
 								id_visitante,
 								cveVisitante,
								departamento,
								tramite,
								ciudad,
 								fecha_ingreso,
 								hora_ingreso,

								activo
 								)
							VALUES
								(
								'$idVisitante',
 								'$claveV',
								'$departamentoA',
								'$tramiteVI',
								'$ciudadA',
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
    $contador3=0;
}



$nombre3=$row3[4]." ".$row3[5]." ".$row3[6];

echo "$ES,$mje,$nombre3";
				
 ?>


