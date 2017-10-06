<?php
header("Content-Type: text/html;charset=utf-8");
header('Access-Control-Allow-Origin: *');
include 'inc/conexion.php';
$id_bbdd = isset($_POST['part_number']) ? $_POST['part_number'] : NULL;
$sql = "SELECT * FROM pruebas_bbdd WHERE part_number= '$part_number'";
$result = mysqli_query($link, $sql);

$output= array();
while($fila = mysqli_fetch_assoc($result)){
    $output[]=array_map('utf8_encode', $fila);
}
echo '{"Articulo":'.json_encode($output).'}';

