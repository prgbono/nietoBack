<?php

header('Access-Control-Allow-Origin: *');

//Incluir el fichero de conexión para conectar con la BBDD
include 'inc/conexion.php';

// Obtener los datos que nos envía jquery 
extract($_REQUEST); //A partir de esta línea tenemos disponibles unas variables que se llaman igual que el atributo name de los inputs del formulario. 

//$fecha_newPpto = $_REQUEST['fecha_newPpto'];
//$asunto_newPpto = $_REQUEST['asunto_newPpto'];
//$id_coche = $_REQUEST['id_coche'];
//$id_cliente = $_REQUEST['id_cliente'];
//$transporte_newPpto = $_REQUEST['transporte_newPpto'];
//$canarias_newPpto = $_REQUEST['canarias_newPpto'];

$fecha_newPpto = '17-2-2016';
$asunto_newPpto = asunto;
$id_coche = 1;
$id_cliente = 1;
$transporte_newPpto = 500;
$canarias_newPpto = 1;


$query= "INSERT INTO pruebas_presupuestos (fecha, asunto, id_coche, id_cliente, total, transporte, canarias, subtotal, iva) VALUES ('$fecha_newPpto', '$asunto_newPpto', (SELECT id_coche from pruebas_coches WHERE (id_cliente = '$id_cliente' AND ppal=1)), '$id_cliente', 0, '$transporte_newPpto', '$canarias_newPpto', 0, 0)";


echo $query;





