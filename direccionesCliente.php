<?php
header("Content-Type: text/html;charset=utf-8");
header('Access-Control-Allow-Origin: *');
include 'inc/conexion.php';
$cliente = isset($_POST['cliente']) ? $_POST['cliente'] : NULL; 
$dirCli="select * from pruebas_direcciones WHERE id_cliente = '$cliente'";

$result = mysqli_query($link, $dirCli);

$output= array();
while ($fila = mysqli_fetch_assoc($result)){
    $output[]=array_map('utf8_encode', $fila);
}

echo '{"Direcciones":'.json_encode($output).'}';

