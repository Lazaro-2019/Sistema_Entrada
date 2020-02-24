<?php 
include('../conexion/conexion.php');

$fechaModal= $_POST["fecha"];
$departamento= $_POST["departamento"];
$idM= $_POST["idM"];

// Variables de configuración
$titulo="Gráficas de Buen Trato";
$opcionMenu="A";
$fecha=date("Y-m-d"); 
$mes=date("m");
$year=date("Y");
$anteriores=$mes-6;

$registrosCompletos=mysql_query("SELECT encuesta FROM registroasegurados WHERE fecha_ingreso='$fechaModal'",$conexion) or die(mysql_error());
$registrosCantidad=mysql_num_rows($registrosCompletos);

if ($registrosCantidad>0) {
	if ($idM=="asegurados") {
		$consultaA=mysql_query("SELECT encuesta FROM registroasegurados WHERE fecha_ingreso='$fechaModal' AND encuesta = 'NO' AND departamento='$departamento'",$conexion) or die(mysql_error());
		$contadorA=mysql_num_rows($consultaA);
		$totalA=($contadorA*100)/$registrosCantidad;

		$consultaA2=mysql_query("SELECT encuesta FROM registroasegurados WHERE fecha_ingreso='$fechaModal'  AND encuesta = 'SI' AND departamento='$departamento'",$conexion) or die(mysql_error());
		$contadorA2=mysql_num_rows($consultaA2);
		$totalA2=($contadorA2*100)/$registrosCantidad;
			
		while ($filaRowA= mysql_fetch_array($consultaA)) {
				$rowA="{ name:'".$filaRowA['encuesta']."', y:".$totalA."},";
			}
			while ($filaRowA2= mysql_fetch_array($consultaA2)) {
				$rowA2="{ name:'".$filaRowA2['encuesta']."', y:".$totalA2."},";
			}

			$reg="$registrosCantidad";
			$contA="$contadorA";
			$contA2="$contadorA2";


			echo "$reg,$contA,$contA2";	
	}
	else {
		$consultaA=mysql_query("SELECT encuesta FROM registropatrones WHERE fecha_ingreso='$fechaModal' AND encuesta = 'NO' AND departamento='$departamento'",$conexion) or die(mysql_error());
		$contadorA=mysql_num_rows($consultaA);
		$totalA=($contadorA*100)/$registrosCantidad;

		$consultaA2=mysql_query("SELECT encuesta FROM registropatrones WHERE fecha_ingreso='$fechaModal'  AND encuesta = 'SI' AND departamento='$departamento'",$conexion) or die(mysql_error());
		$contadorA2=mysql_num_rows($consultaA2);
		$totalA2=($contadorA2*100)/$registrosCantidad;
			
		while ($filaRowA= mysql_fetch_array($consultaA)) {
				$rowA="{ name:'".$filaRowA['encuesta']."', y:".$totalA."},";
			}
			while ($filaRowA2= mysql_fetch_array($consultaA2)) {
				$rowA2="{ name:'".$filaRowA2['encuesta']."', y:".$totalA2."},";
			}

			$reg="$registrosCantidad";
			$contA="$contadorA";
			$contA2="$contadorA2";


			echo "$reg,$contA,$contA2";	
	}
}
else{
	echo "No hay registros";
}


 ?>
