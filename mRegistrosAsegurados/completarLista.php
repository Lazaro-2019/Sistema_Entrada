<?php 
// Conexion a la base de datos
include('../conexion/conexion.php');
include('../sesiones/verificar_sesion.php');
// Codificacion de lenguaje
mysql_query("SET NAMES utf8");
// Consulta a la base de datos
$resultado=mysql_query("SELECT
                            registroasegurados.id_registro,
                            registroasegurados.NSeguroSocial,
                            asegurados.nombre_asegurado,
                            registroasegurados.fecha_ingreso,
                            registroasegurados.hora_ingreso,
                            registroasegurados.fecha_salida,
                            registroasegurados.hora_salida
                        FROM
                            registroasegurados
                        INNER JOIN asegurados ON asegurados.nssocial = registroasegurados.NSeguroSocial
                        ORDER BY
                            registroasegurados.id_registro DESC",$conexion) or die (mysql_error());
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
