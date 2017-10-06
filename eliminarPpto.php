<?php
header("Content-Type: text/html;charset=utf-8");
header('Access-Control-Allow-Origin: *');
include 'inc/conexion.php';
extract($_POST);

//Eliminar ppto y todos sus artículos
$query = "DELETE FROM pruebas_detalle_presupuestos WHERE id_ppto = $id_ppto";
mysqli_query($link, $query);
$query = "DELETE FROM pruebas_presupuestos WHERE id_ppto=$id_ppto";
echo mysqli_query($link, $query);





