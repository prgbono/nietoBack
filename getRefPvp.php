<?php
header('Access-Control-Allow-Origin: *');

//BBDD connect
include 'inc/conexion.php';

//cadena a buscar en las descripciones
$title = isset($_REQUEST['title']) ? $_REQUEST['title'] : NULL;
/*$sql = "SELECT part_number, gbp FROM pruebas_bbdd WHERE id_bbdd = '$id'";*/
$sql = "SELECT part_number, gbp FROM pruebas_bbdd WHERE title = '$sp_title'";
$result = mysqli_query($link, $sql);

//JSON
$output= array();
while($fila = mysqli_fetch_assoc($result)){
    //$output[]= $fila; Con esta instrucción bastaría pero los registros con tildes los pone a null
    $output[]=array_map('utf8_encode', $fila);

}
//echo $sql;
//echo count($output);
echo '{"pruebasBBDD":'.json_encode($output).'}';
//Falta el close connection mysqli_close(mysqli_connect($host, $user, $password, $database)) or die("Error en la DCX");




    









