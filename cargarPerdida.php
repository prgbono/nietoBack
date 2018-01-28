<?php
header("Content-Type: text/html;charset=utf-8");
header('Access-Control-Allow-Origin: *');
include 'inc/conexion.php';
$id_bbdd = isset($_POST['part_number']) ? $_POST['part_number'] : NULL;
$sql = "SELECT pruebas_perdidas.id_perdida, pruebas_perdidas.id_pedido, pruebas_perdidas.concepto, pruebas_perdidas.coste, DATE_FORMAT(pruebas_perdidas.fecha, '%d-%m-%Y') as fecha FROM pruebas_perdidas WHERE id_perdida= '$id_perdida";
$result = mysqli_query($link, $sql);

$output= array();
while($fila = mysqli_fetch_assoc($result)){
    $output[]=array_map('utf8_encode', $fila);
}
echo '{"Perdida":'.json_encode($output).'}';
