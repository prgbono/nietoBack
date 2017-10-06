<?php
header("Content-Type: text/html;charset=utf-8");
header('Access-Control-Allow-Origin: *');
include 'inc/conexion.php';
//Obtener la id del pedido que nos envía jquery
extract($_POST);
$query = "DELETE FROM pruebas_pedidos WHERE id_pedido=$id_ped";
echo mysqli_query($link, $query);