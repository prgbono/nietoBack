<?php
header('Access-Control-Allow-Origin: *');
include 'inc/conexion.php';
$id_bbdd = isset($_POST['id_bbdd']) ? $_POST['id_bbdd'] : NULL;
$sql = "SELECT * FROM pruebas_bbdd WHERE id_bbdd= '$id_bbdd'";
$result = mysqli_query($link, $sql);

$output= array();
while($fila = mysqli_fetch_assoc($result)){
    $output[]=array_map('utf8_encode', $fila);
}
echo '{"Articulo":'.json_encode($output).'}';

