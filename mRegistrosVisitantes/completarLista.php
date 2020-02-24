<?php 
// Conexion a la base de datos
include('../conexion/conexion.php');
include('../sesiones/verificar_sesion.php');
// Codificacion de lenguaje
mysql_query("SET NAMES utf8");
// Consulta a la base de datos
$resultado=mysql_query("SELECT
                            registrovisitantes.id_registro,
                            registrovisitantes.cveVisitante,
                            visitantes.visitante,
                            registrovisitantes.fecha_ingreso,
                            registrovisitantes.hora_ingreso,
                            registrovisitantes.fecha_salida,
                            registrovisitantes.hora_salida
                        FROM
                        registrovisitantes
                        INNER JOIN visitantes ON visitantes.cveVisitante = registrovisitantes.cveVisitante
                        ORDER BY
                        registrovisitantes.id_registro DESC",$conexion) or die (mysql_error());
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
