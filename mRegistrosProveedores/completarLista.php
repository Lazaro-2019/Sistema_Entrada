<?php 
// Conexion a la base de datos
include('../conexion/conexion.php');
include('../sesiones/verificar_sesion.php');

// Codificacion de lenguaje
mysql_query("SET NAMES utf8");
// Consulta a la base de datos
$resultado=mysql_query("SELECT
                            registroproveedores.id_registro,
                            registroproveedores.cveProveedor,
                            proveedores.proveedor,
                            registroproveedores.fecha_ingreso,
                            registroproveedores.hora_ingreso,
                            registroproveedores.fecha_salida,
                            registroproveedores.hora_salida
                        FROM
                        registroproveedores
                        INNER JOIN proveedores ON proveedores.cveProveedor = registroproveedores.cveProveedor
                        ORDER BY
                        registroproveedores.id_registro DESC",$conexion) or die (mysql_error());
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
