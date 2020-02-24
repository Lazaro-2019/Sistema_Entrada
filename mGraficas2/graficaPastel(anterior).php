<?php 
// Conexion a la base de datos
include('../conexion/conexion.php');

// Codificacion de lenguaje
mysql_query("SET NAMES utf8");

$mes=date("m");
// $mesesAnteriores=$mes-6;
$consulta=mysql_query("SELECT
								YEAR(fecha_ingreso),
								encuesta
							FROM
								registropatrones
							WHERE
								encuesta = 'SI'
							AND MONTH(fecha_ingreso) = '$mes'",$conexion);
$consulta2=mysql_query("SELECT
								fecha_ingreso,
								encuesta
							FROM
								registropatrones
							WHERE
								encuesta = 'NO'
							AND MONTH(fecha_ingreso) = '$mes'",$conexion);

	$valoresX=array();//SI
	$valoresY=array();//NO

	$valoresNX=array();//SI
	$valoresNY=array();//NO

	$cantidad=mysql_num_rows($consulta);

	while ($row=mysql_fetch_row($consulta)) {
		$valoresX[]=$row[0];
		$valoresY[]=$row[1];
	}
	while ($row2=mysql_fetch_row($consulta2)) {
		$valoresNX[]=$row2[0];
		$valoresNY[]=$row2[1];
	}
	$datosX=json_encode($valoresX);
	$datosY=json_encode($valoresY);

	$datosNX=json_encode($valoresNX);
	$datosNY=json_encode($valoresNY);

	$cantidadY=json_encode($cantidad);

?>

<div id="graficaPastel">

</div>

<script type="text/javascript">
	function crearCadenaPastel(json) {
		var parsed=JSON.parse(json);
		var arr =[];
		for (var x in parsed) {
			arr.push(parsed[x]);	
		}
		return arr;
	}
</script>

<script type="text/javascript">
	datosX=crearCadenaPastel('<?php echo $datosX ?>');
	datosY=crearCadenaPastel('<?php echo $datosY ?>');

	datosNX=crearCadenaPastel('<?php echo $datosNX ?>');
	datosNY=crearCadenaPastel('<?php echo $datosNY ?>');
	cantidadY=crearCadenaPastel('<?php echo $cantidad ?>');

console.log(datosX);
console.log(datosY);

	var trace1 = {
	x: datosY,
	y: datosX,
	name: 'SF Zoo',
	type: 'scatter'
	};


	var data = [trace1];

	var layout = {barmode: 'group'};

	Plotly.newPlot('graficaPastel', data, layout);

	// var data = [{
	// values: [datosX, datosY, datosY],
	// labels: ['Residential', 'Non-Residential', 'Utility'],
	// type: 'pie'
	// }];

	// var layout = {
	// height: 400,
	// width: 500
	// };

	// Plotly.newPlot('graficaPastel', data, layout);
</script>