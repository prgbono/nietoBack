<?php
header("Content-Type: text/html;charset=utf-8");
header('Access-Control-Allow-Origin: *');
include 'inc/conexion.php';
//Obtener la id del user que nos envía jquery
$cliente = isset($_POST['cliente']) ? $_POST['cliente'] : NULL; 
        
$cochesCli="select * from pruebas_coches WHERE id_cliente = $cliente";
//$cochesCli="select * from pruebas_coches WHERE id_cliente = '707'";
$result = mysqli_query($link, $cochesCli);

$output= array();
while ($fila = mysqli_fetch_assoc($result)){
    $output[]=array_map('utf8_encode', $fila);
}

echo '{"Coches":'.json_encode($output).'}';



    

