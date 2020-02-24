<?php
//se manda llamar la conexion
include("../conexion/conexion.php");

$id_Asegurado= $_POST["idAsegurado"];
$NSSocial= $_POST["NSSocial"];
$nombreA= $_POST["nombreA"];
$ciudadA= $_POST["ciudadA"];
$departamentoA= $_POST["departamentoA"];
$tramiteA= $_POST["tramiteA"];
$encuestaA=$_POST["encuestaA"];

$fecha   = date("Y-m-d"); 
$hora    = date ("H:i:s");
//1-CONSULTA QUE EXISTA LA MATRICULA QUE INTRODUCES
//CONSULTA
	$consulta3=mysql_query("SELECT
								id_asegurado,
								nssocial,
								nombre_asegurado									
							FROM
									asegurados
							WHERE nssocial ='$NSSocial'"
							,$conexion) or die (mysql_error());
	$row3             =mysql_fetch_row($consulta3);
	$contador3        =mysql_num_rows($consulta3);

//RESPUESTA
/*variables para insert*/
$idAsegurado = $row3[0];

//ENCUENTRA UNA MATRICULA
if ($contador3!=0){
	//SI ENCONTRO EL ALUMNO Y VA A CHECAR SI ES UNA ENTRADA O UNA SALIDA
	$consulta4=mysql_query("SELECT 
							registroasegurados.id_registro,
							registroasegurados.id_asegurado,
							registroasegurados.NSeguroSocial,
							registroasegurados.fecha_ingreso,
							registroasegurados.hora_ingreso,
							registroasegurados.fecha_salida,
							registroasegurados.hora_salida
							FROM 
							registroasegurados 
							INNER JOIN asegurados on asegurados.id_asegurado=registroasegurados.id_asegurado
							WHERE asegurados.nssocial='$NSSocial' and asegurados.activo='1'  and fecha_ingreso='$fecha' and hora_salida is NULL
							",$conexion) or die (mysql_error());
	$rowSalidasNulas3	=mysql_fetch_row($consulta4);
	$contador4        =mysql_num_rows($consulta4);				
	$idRegistro3=$rowSalidasNulas3[0];

	if ($contador4!=0) {
		//SALIDA UPDATE
		$update=mysql_query("UPDATE registroasegurados SET 
							fecha_salida='$fecha',
							hora_salida='$hora',
							encuesta='$encuestaA'
							WHERE id_registro='$idRegistro3'
							",$conexion) or die (mysql_error());
		$ES="Salida";
		$mje="Se ha registrado la salida";
	}else{
		//ENTRADA INSERT
		$insertar = mysql_query("INSERT INTO registroasegurados
 								(
 								id_asegurado,
 								NSeguroSocial,
								departamento,
								tramite,
								ciudad,
 								fecha_ingreso,
 								hora_ingreso,

								activo
 								)
							VALUES
								(
								'$idAsegurado',
 								'$NSSocial',
								'$departamentoA',
								'$tramiteA',
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


