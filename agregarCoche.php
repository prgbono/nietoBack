<?php
header("Content-Type: text/html;charset=utf-8");
header('Access-Control-Allow-Origin: *');
include 'inc/conexion.php';

extract($_POST); 
$id_cliente = utf8_decode(trim($id_cliente));
$modelo = utf8_decode(trim($input_modeloNew));
$bastidor = utf8_decode(trim($input_basNew));
$anio = utf8_decode(trim($anioNew));

$query = "INSERT INTO pruebas_coches (id_cliente, ppal, modelo, bastidor, anio) VALUES ('$id_cliente', '0', '$modelo', '$bastidor', '$anio')";
echo $query;
$result = mysqli_query($link, $query);



