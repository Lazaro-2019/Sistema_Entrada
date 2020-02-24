<?php

$bd_host = "localhost";
$bd_usuario = "root";
$bd_password = "";
$bd_base = "sistema_registro";

$conexion = mysql_connect($bd_host,$bd_usuario,$bd_password) ;
mysql_select_db($bd_base,$conexion)or die (mysql_error());
?>