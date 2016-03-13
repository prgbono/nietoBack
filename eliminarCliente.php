<?php

header('Access-Control-Allow-Origin: *');

include 'inc/conexion.php';

//Obtener la id del cliente que nos envía jquery
extract($_REQUEST);

$query = "DELETE FROM pruebas_clientes WHERE id_cliente=$id_cliente";

//ejecutamos y devuelve el nº de filas afectadas
echo mysqli_query($link, $query);