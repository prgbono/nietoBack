<?php
header('Access-Control-Allow-Origin: *');
include 'inc/conexion.php';

$keyword = isset($_REQUEST['keyword']) ? '%'.$_REQUEST['keyword'].'%' : NULL;

//Esta parte sobra, no entra en este caso nunca
if(is_null($keyword)){
    $sql = "SELECT sp_title FROM pruebas_bbdd ORDER BY sp_title";
}
else{
    $sql = "SELECT sp_title FROM pruebas_bbdd WHERE sp_title LIKE '$keyword' OR part_number LIKE '$keyword' OR title LIKE '$keyword'  ORDER BY sp_title";
}

$result = mysqli_query($link, $sql);

$output= array();
while($fila = mysqli_fetch_assoc($result)){
    //$output[]= $fila; Con esta instrucción bastaría pero los registros con tildes los pone a null
    $output[]=array_map('utf8_encode', $fila);

}
echo '{"Descripciones":'.json_encode($output).'}';




    









