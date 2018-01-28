<?php
header("Content-Type: text/html;charset=utf-8");
header('Access-Control-Allow-Origin: *');
include 'inc/conexion.php';

$sql="SELECT pruebas_perdidas.id_perdida, pruebas_perdidas.id_pedido, pruebas_perdidas.concepto, pruebas_perdidas.coste, DATE_FORMAT(pruebas_perdidas.fecha, '%d-%m-%Y') as fecha FROM pruebas_perdidas order by id_perdida desc";

$result = mysqli_query($link, $sql);
$output= array();
while($fila = mysqli_fetch_assoc($result)){
    $output[]=array_map('utf8_encode', $fila);

}
echo '{"Perdidas":'.json_encode($output).'}';
