<?php

header('Access-Control-Allow-Origin: *');
include 'inc/conexion.php';

extract($_REQUEST); 

$fecha_newPpto = isset($_REQUEST['fecha_newPpto']) ? $_REQUEST['fecha_newPpto'] : 'jopeta';

/*usar array_filter para eliminar eltos vacíos en arrays dinámicos*/
$descripcion=array_filter($_REQUEST[descripcion]);
$ref=array_filter($_REQUEST[ref]);
$check=array_filter($_REQUEST[check]);
$uds=array_filter($_REQUEST[uds]);
$precio=array_filter($_REQUEST[precio]);
$cambio=array_filter($_REQUEST[cambio]);
$pvp=array_filter($_REQUEST[pvp]);
$dto=array_filter($_REQUEST[dto]);
$total=array_filter($_REQUEST[total]);



$a = sizeof($descripcion);
echo $a;
//echo $query;





