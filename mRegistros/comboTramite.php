<?php
include("../conexion/conexion.php");
include('../sesiones/verificar_sesion.php');

$departamento=$_POST["departamento"];

mysql_query("SET NAMES utf8");

$consulta = mysql_query("SELECT
							id_tramite,
							tramite
						FROM
							tramites WHERE id_departamento='$departamento' AND pertenece='patrones'",$conexion)or die(mysql_error());
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
 $("#tramite").select2();
</script>