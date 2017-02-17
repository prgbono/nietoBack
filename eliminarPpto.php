<?php
header('Access-Control-Allow-Origin: *');
include 'inc/conexion.php';
extract($_REQUEST);

//Eliminar ppto y todos sus artículos
$query = "DELETE FROM pruebas_detalle_presupuestos WHERE id_ppto = $id_ppto";
mysqli_query($link, $query);
$query = "DELETE FROM pruebas_presupuestos WHERE id_ppto=$id_ppto";
echo mysqli_query($link, $query);





