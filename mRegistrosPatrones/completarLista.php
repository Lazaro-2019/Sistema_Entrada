<?php 
// Conexion a la base de datos
include('../conexion/conexion.php');
include('../sesiones/verificar_sesion.php');

// Codificacion de lenguaje
mysql_query("SET NAMES utf8");
// Consulta a la base de datos
$resultado=mysql_query("SELECT
                            registropatrones.id_registro,
                            registropatrones.NRegPatronal,
                            patrones.nombre_patron,
                            registropatrones.fecha_ingreso,
                            registropatrones.hora_ingreso,
                            registropatrones.fecha_salida,
                            registropatrones.hora_salida
                        FROM
                        registropatrones
                        INNER JOIN patrones ON patrones.NRegPatronal = registropatrones.nregpatronal
                        ORDER BY
                            registropatrones.id_registro DESC",$conexion) or die (mysql_error());
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
