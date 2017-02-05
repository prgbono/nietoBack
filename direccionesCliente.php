<?php
header('Access-Control-Allow-Origin: *');
include 'inc/conexion.php';
$cliente = isset($_REQUEST['cliente']) ? $_REQUEST['cliente'] : NULL; 
$dirCli="select * from pruebas_direcciones WHERE id_cliente = '$cliente'";

$result = mysqli_query($link, $dirCli);

$output= array();
while ($fila = mysqli_fetch_assoc($result)){
    $output[]=array_map('utf8_encode', $fila);
}

echo '{"Direcciones":'.json_encode($output).'}';

