<?php
header('Access-Control-Allow-Origin: *');
include 'inc/conexion.php';
extract($_REQUEST);
$query = "DELETE FROM pruebas_presupuestos WHERE id_ppto=$id_ppto";
echo mysqli_query($link, $query);





