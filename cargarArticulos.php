<?php
header('Access-Control-Allow-Origin: *');
include 'inc/conexion.php';

$id_ppto = isset($_REQUEST['id_ppto']) ? $_REQUEST['id_ppto'] : NULL;

$sql = "SELECT * FROM pruebas_detalle_presupuestos ";


if (!is_null($id_ppto)){
	$sql = $sql . "WHERE id_ppto = ".$id_ppto;
} 

$result = mysqli_query($link, $sql);


//JSON
$output= array();
while($fila = mysqli_fetch_assoc($result)){
    //$output[]= $fila; Con esta instrucción bastaría pero los registros con tildes los pone a null
    $output[]=array_map('utf8_encode', $fila);

}

    //Falta el close connection mysqli_close(mysqli_connect($host, $user, $password, $database)) or die("Error en la DCX");

echo '{"Articulos":'.json_encode($output).'}';
