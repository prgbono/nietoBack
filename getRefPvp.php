<?php
header('Access-Control-Allow-Origin: *');

//BBDD connect
include 'inc/conexion.php';

//cadena a buscar en las descripciones
$des = isset($_REQUEST['des']) ? $_REQUEST['des'] : NULL;

$sql = "SELECT * FROM pruebas_bbdd WHERE sp_title = '$des'";
/*$sql = "SELECT * FROM pruebas_bbdd WHERE sp_title = 'Plastic Pop Rivet (ps23730pa)'";*/

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




    









