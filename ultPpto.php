<?php
header('Access-Control-Allow-Origin: *');
include ('../nietoBack/inc/conexion.php');

$sql =  "SELECT id_ppto, id_cliente FROM pruebas_presupuestos WHERE id_ppto = (SELECT MAX(id_ppto) as maxId_ppto FROM pruebas_presupuestos)"; 
$result = mysqli_query($link, $sql);

$output= array();
while($fila = mysqli_fetch_assoc($result)){
    $output[]=array_map('utf8_encode', $fila);
}

echo json_encode($output);



