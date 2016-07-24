<?php

header('Access-Control-Allow-Origin: *');

include 'inc/conexion.php';

//Obtener la id 
extract($_REQUEST);

$query = "DELETE FROM pruebas_bbdd WHERE id_bbdd=$id_bbdd";

//ejecutamos y devuelve el nº de filas afectadas
echo mysqli_query($link, $query);