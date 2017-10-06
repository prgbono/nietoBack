<?php
header("Content-Type: text/html;charset=utf-8");
header('Access-Control-Allow-Origin: *');
include 'inc/conexion.php';
extract($_POST);

$id_pedido = utf8_decode(isset($_POST['id_pedido']) ? $_POST['id_pedido'] : NULL); 
$fra_env = utf8_decode(isset($_POST['fra_env']) ? $_POST['fra_env'] : NULL); 
$trimestre = utf8_decode(isset($_POST['trimestre']) ? $_POST['trimestre'] : NULL); 

$query= "UPDATE pruebas_pedidos SET fra_env='$fra_env', trimestre='$trimestre' WHERE id_pedido='$id_pedido' ";

$result = mysqli_query($link, $query);
echo mysqli_num_rows($result);