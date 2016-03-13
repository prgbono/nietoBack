<?php

header('Access-Control-Allow-Origin: *');

include 'inc/conexion.php';

//Obtener la id del ppto que nos envía jquery
extract($_REQUEST);

$query = "DELETE FROM pruebas_presupuestos WHERE id_ppto=$id_ppto";


//ejecutamos y devuelve el nº de filas afectadas
echo mysqli_query($link, $query);