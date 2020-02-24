<?php 
include("../conexion/conexion.php");

$NSSocial= $_POST["NSSocial"];


$datos=mysql_query("SELECT
                          id_asegurado,
                          nombre_asegurado 
                    FROM asegurados 
                    WHERE nssocial='$NSSocial'"
                    ,$conexion) or die(mysql_error());


$row=mysql_fetch_row($datos);
$contador=mysql_num_rows($datos);

  if ($contador!=0) {
    
    $mje="Registro Encontrado";
  }
  else {
    
  }
$id_asegurado       = $row[0];
$nombre_asegurado   = $row[1];

echo "$mje,$nombre_asegurado,$id_asegurado";

 ?>

