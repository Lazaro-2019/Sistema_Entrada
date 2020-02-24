<?php 
// Conexion a la base de datos
include('../conexion/conexion.php');
include('../sesiones/verificar_sesion.php');
// Codificacion de lenguaje
mysql_query("SET NAMES utf8");
// Consulta a la base de datos
$resultado=mysql_query("SELECT
							id_asegurado,
							nssocial,
							nombre_asegurado,
							nombre,
							ap_paterno,
							ap_materno,
							ciudad_procedencia,
							sexo,
							direccion,
							telefono,
							fecha_nacimiento,
							correo
                                FROM
                                asegurados",$conexion) or die (mysql_error());
    if (!$resultado) {
        die("Error");
    }
    else {
        while ($data=mysql_fetch_assoc($resultado)) {
            $arreglo["data"][]=$data;
        }
        echo json_encode($arreglo);
    }

    mysql_free_result($resultado);
    mysql_close($conexion);
