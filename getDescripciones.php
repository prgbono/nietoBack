<?php
header('Access-Control-Allow-Origin: *');

//BBDD connect
include 'inc/conexion.php';

//cadena a buscar en las descripciones
$keyword = isset($_REQUEST['keyword']) ? '%'.$_REQUEST['keyword'].'%' : NULL;

//Esta parte sobra, no entra en este caso nunca
if(is_null($keyword)){
    $sql = "SELECT sp_title FROM pruebas_bbdd ORDER BY sp_title";
}
else{
    $sql = "SELECT sp_title FROM pruebas_bbdd WHERE sp_title LIKE '$keyword' ORDER BY sp_title";
}

//ejecutamos
$result = mysqli_query($link, $sql);

//JSON
$output= array();
while($fila = mysqli_fetch_assoc($result)){
    //$output[]= $fila; Con esta instrucción bastaría pero los registros con tildes los pone a null
    $output[]=array_map('utf8_encode', $fila);

}
//echo $sql;
//echo count($output);
echo '{"Descripciones":'.json_encode($output).'}';
//Falta el close connection mysqli_close(mysqli_connect($host, $user, $password, $database)) or die("Error en la DCX");




    









