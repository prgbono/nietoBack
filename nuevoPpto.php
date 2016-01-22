<?php

header('Access-Control-Allow-Origin: *');

//Incluir el fichero de conexión para conectar con la BBDD
include 'inc/conexion.php';

// Obtener los datos que nos envía jquery 
extract($_REQUEST); //A partir de esta línea tenemos disponibles unas variables que se llaman igual que el atributo name de los inputs del formulario. 

$id_cliente = $_REQUEST['id_cliente'];


//$query= "INSERT INTO pruebas_presupuestos (fecha, asunto, id_coche, id_cliente, total, transporte, canarias, subtotal, iva) VALUES ('$fecha_newPpto', '$asunto_newPpto', 'SELECT id_coche ppal del cliente pasado', 'SELECT id_cliente', calc(total), '$transporte_newPpto', '$canarias_newPpto', calc(subtotal), iva)";

echo $id_cliente;




