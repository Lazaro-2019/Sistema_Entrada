<?php
//se manda llamar la conexion
include("../conexion/conexion.php");

$clave= $_POST["clave"];
$proveedor= $_POST["proveedor"];
$ciudadPR= $_POST["ciudadPR"];
$departamentoPR= $_POST["departamentoPR"];
$tramitePR= $_POST["tramitePR"];
$encuestaPR= $_POST["encuestaPR"];


$fecha   = date("Y-m-d"); 
$hora    = date ("H:i:s");
//1-CONSULTA QUE EXISTA LA MATRICULA QUE INTRODUCES
//CONSULTA
	$consulta=mysql_query("SELECT
								id_proveedor,
								cveProveedor,
								proveedor								
							FROM
									proveedores
							WHERE cveProveedor ='$clave'"
							,$conexion) or die (mysql_error());
	$row             =mysql_fetch_row($consulta);
	$contador        =mysql_num_rows($consulta);

//RESPUESTA
/*variables para insert*/
$idProveedor = $row[0];

//ENCUENTRA UNA MATRICULA
if ($contador!=0){
	//SI ENCONTRO EL ALUMNO Y VA A CHECAR SI ES UNA ENTRADA O UNA SALIDA
	$consulta2=mysql_query("SELECT 
							registroproveedores.id_registro,
							registroproveedores.id_proveedor,
							registroproveedores.cveProveedor,
							registroproveedores.fecha_ingreso,
							registroproveedores.hora_ingreso,
							registroproveedores.fecha_salida,
							registroproveedores.hora_salida
							FROM 
							registroproveedores 
							INNER JOIN proveedores on proveedores.id_proveedor=registroproveedores.id_proveedor
							WHERE proveedores.cveProveedor='$clave' and proveedores.activo='1'  and fecha_ingreso='$fecha' and hora_salida is NULL
							",$conexion) or die (mysql_error());

	$rowSalidasNulas	=mysql_fetch_row($consulta2);
	$contador2        =mysql_num_rows($consulta2);				
	$idRegistro=$rowSalidasNulas[0];


	if ($contador2!=0) {
		//SALIDA UPDATE
		$update=mysql_query("UPDATE registroproveedores SET 
							fecha_salida='$fecha',
							hora_salida='$hora',
							encuesta='$encuesta'
							WHERE id_registro='$idRegistro'
							",$conexion) or die (mysql_error());
		$ES="Salida";
		$mje="Se ha registrado la salida";
	}else{
		//ENTRADA INSERT
		$insertar = mysql_query("INSERT INTO registroproveedores
 								(
 								id_proveedor,
								cveProveedor,
								departamento,
								tramite,
								ciudad,
 								fecha_ingreso,
 								hora_ingreso,
								activo
 								)
							VALUES
								(
								'$idProveedor',
								'$clave',
								'$departamentoPR',
								'$tramitePR',
								'$ciudadPR',
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


