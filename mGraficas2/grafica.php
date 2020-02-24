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

		$registrosCompletos=mysql_query("SELECT encuesta FROM registroasegurados WHERE fecha_ingreso='$fechaModal'",$conexion) or die(mysql_error());
		$registrosCantidad=mysql_num_rows($registrosCompletos);

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

?>

<script type="text/javascript">
		Highcharts.chart('container', {
			chart: {
				plotBackgroundColor: null,
				plotBorderWidth: null,
				plotShadow: false,
				type: 'pie'
			},
			title: {
				text: 'Resultados de encuesta de buen trato por dia'
			},
			tooltip: {
				pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
			},
			plotOptions: {
				pie: {
					allowPointSelect: true,
					cursor: 'pointer',
					dataLabels: {
						enabled: true,
						format: '<b>{point.name}</b>: {point.percentage:.1f} %',
						style: {
							color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
						}
					}
				}
			},
			series: [{
				name: 'Porcentaje',
				colorByPoint: true,
				data: [
					<?php 
						echo $rowA;
						echo $rowA2;
					?>
				]
			}]
		});
	</script>

