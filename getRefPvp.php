<?php
header('Access-Control-Allow-Origin: *');
include 'inc/conexion.php';
//cadena a buscar en las descripciones
$sp_title = isset($_REQUEST['sp_title']) ? $_REQUEST['sp_title'] : NULL;

$sql = "SELECT part_number, gbp FROM pruebas_bbdd WHERE sp_title = '$sp_title'";
$result = mysqli_query($link, $sql);

$output= array();
while($fila = mysqli_fetch_assoc($result)){
    $output[]=array_map('utf8_encode', $fila);

}
echo '{"pruebasBBDD":'.json_encode($output).'}';





    









