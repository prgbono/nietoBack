<?php
header("Content-Type: text/html;charset=utf-8");
header('Access-Control-Allow-Origin: *');
include 'inc/conexion.php';
extract($_POST);
$query = "DELETE FROM pruebas_perdidas WHERE id_perdida=$id_perdida";
echo mysqli_query($link, $query);