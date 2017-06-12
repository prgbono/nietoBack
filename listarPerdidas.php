<?php
header('Access-Control-Allow-Origin: *');
include 'inc/conexion.php';

$sql="SELECT * FROM pruebas_perdidas";

$result = mysqli_query($link, $sql);
$output= array();
while($fila = mysqli_fetch_assoc($result)){
    $output[]=array_map('utf8_encode', $fila);

}
echo '{"Perdidas":'.json_encode($output).'}';