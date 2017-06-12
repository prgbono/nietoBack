<?php

header('Access-Control-Allow-Origin: *');
include 'inc/conexion.php';

extract($_POST); 
$pedido = utf8_decode(trim($pedido));
$concepto = utf8_decode(trim($concepto));
$coste = utf8_decode(trim($coste));
$fecha = utf8_decode(trim($fecha));

$query = "INSERT INTO pruebas_perdidas (id_pedido, concepto, coste, fecha) VALUES ('$pedido', '$concepto', '$coste', STR_TO_DATE('$fecha', '%d/%m/%Y'))";
//echo $query;
$result = mysqli_query($link, $query);

