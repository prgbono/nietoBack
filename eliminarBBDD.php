<?php
header("Content-Type: text/html;charset=utf-8");
header('Access-Control-Allow-Origin: *');
include 'inc/conexion.php';
//Obtener la id 
extract($_POST);

$query = "DELETE FROM pruebas_bbdd WHERE part_number=$part_number";
echo mysqli_query($link, $query);