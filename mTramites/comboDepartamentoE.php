<?php
include("../conexion/conexion.php");
include('../sesiones/verificar_sesion.php');

$idDepartamento    = $_POST["idDepartamento"];


mysql_query("SET NAMES utf8");

$consulta = mysql_query("SELECT
							id_departamento,
							departamento
						FROM
							departamentos",$conexion)or die(mysql_error());
?>
    <option value="0">Seleccione...</option>
<?php

while($row = mysql_fetch_row($consulta))
{  
	?>
    	<option value="<?php echo $row[0];?>"><?php echo $row[1];?></option>
	<?php
}

?>
<script>
	$("#departamentoE").select2();
</script>