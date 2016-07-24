<?php

header('Access-Control-Allow-Origin: *');

include 'inc/conexion.php';

//Obtener la id del pedido que nos envía jquery
extract($_REQUEST);

$query = "DELETE FROM pruebas_pedidos WHERE id_pedido=$id_ped";


//ejecutamos y devuelve el nº de filas afectadas
echo mysqli_query($link, $query);