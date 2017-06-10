<?php

header('Access-Control-Allow-Origin: *');
include 'inc/conexion.php';

extract($_POST); 
$referencia = utf8_decode(trim($referencia));
$id_ppto = $id_ppto;
$anul = $anul == 1 ? 'S' : 'N';
$subtotal = $subtotal;
$total = $total;

$query= "UPDATE pruebas_detalle_presupuestos SET anul = '$anul'  WHERE referencia = '$referencia' and id_ppto = $id_ppto";

$query2 = "UPDATE pruebas_pedidos SET anul = '$anul', subtotal = $subtotal, total = $total where id_ppto = $id_ppto";

$result=  mysqli_query($link, $query);
$result=  mysqli_query($link, $query2);

