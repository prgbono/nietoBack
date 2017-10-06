<?php
header("Content-Type: text/html;charset=utf-8");
header('Access-Control-Allow-Origin: *');
include 'inc/conexion.php';

$sql = "SELECT * FROM pruebas_detalle_presupuestos ";


if (!is_null($id_ppto)){
	$sql = $sql . "WHERE id_ppto = ".$id_ppto;
} 
$result = mysqli_query($link, $sql);


//JSON
$output= array();
while($fila = mysqli_fetch_assoc($result)){
    //$output[]= $fila; Con esta instrucción bastaría pero los registros con tildes los pone a null
    $output[]=array_map('utf8_encode', $fila);

}

echo '{"Articulos":'.json_encode($output).'}';