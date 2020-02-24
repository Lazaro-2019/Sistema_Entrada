<?php 
include("../conexion/conexion.php");
include('../sesiones/verificar_sesion.php');

$regPatronal= $_POST["regPatronal"];


$datos=mysql_query("SELECT
                          id_patron,
                          nombre_patron 
                    FROM patrones 
                    WHERE nregpatronal='$regPatronal'"
                    ,$conexion) or die(mysql_error());


$row=mysql_fetch_row($datos);
$contador=mysql_num_rows($datos);

  if ($contador!=0) {
    
    $mje="Registro Encontrado";
  }
  else {
    
  }
$nombre_patron   = $row[1];
$id_patron       = $row[0];
echo "$mje,$nombre_patron,$id_patron";

 ?>

