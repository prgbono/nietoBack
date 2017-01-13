<?php
header('Access-Control-Allow-Origin: *');

//1.Incluir el fichero de conexión para conectar con la BBDD
include 'inc/conexion.php';

extract($_REQUEST);
//extract(utf8_decode($_REQUEST)); //A partir de esta línea tenemos disponibles unas variables que se llaman igual que el atributo name de los inputs del formulario. 

$id_cliente = isset($_REQUEST['id_cliente']) ? $_REQUEST['id_cliente'] : NULL; 
//$id_direcciones = isset($_REQUEST['id_direcciones']) ? $_REQUEST['id_direcciones'] : NULL;
//$id_coches = isset($_REQUEST['id_coches']) ? $_REQUEST['id_coches'] : NULL; 
//$coches_array = isset($_REQUEST['$coches_array']) ? $_REQUEST['$coches_array'] : NULL;

//UTF-8 -- TRAERLO Y DECODIFICARLO EN UN ARRAY PQ NO SÉ LAS VARIABLES QUE VA A TRAER!!!
$nombre = isset($_REQUEST['input_nombre']) ? $_REQUEST['input_nombre'] : 'NO validado'; 
$variado = isset($_REQUEST['input_variado']) ? $_REQUEST['input_variado'] : 'NO validado';
$tlf1 = isset($_REQUEST['input_tlf1']) ? $_REQUEST['input_tlf1'] : 'NO validado';
$tlf2 = isset($_REQUEST['input_tlf2']) ? $_REQUEST['input_tlf2'] : 'NO validado';
$email1 = isset($_REQUEST['input_email1']) ? $_REQUEST['input_email1'] : 'NO validado';
$email2 = isset($_REQUEST['input_email2']) ? $_REQUEST['input_email2'] : 'NO validado';
/*$envio_nombre = isset($_REQUEST['envio_nombre']) ? $_REQUEST['envio_nombre'] : 'NO validado';*/
$envio_calle = isset($_REQUEST['envio_calle']) ? $_REQUEST['envio_calle'] : 'NO validado';
$envioCP = isset($_REQUEST['envioCP']) ? $_REQUEST['envioCP'] : 'NO validado';
$envio_ciudad = isset($_REQUEST['envio_ciudad']) ? $_REQUEST['envio_ciudad'] : 'NO validado';
/*$fact_nombre = isset($_REQUEST['fact_nombre']) ? $_REQUEST['fact_nombre'] : 'NO validado';*/
$fact_calle = isset($_REQUEST['fact_calle']) ? $_REQUEST['fact_calle'] : 'NO validado';
$factCP = isset($_REQUEST['factCP']) ? $_REQUEST['factCP'] : 'NO validado';
$factNIF = isset($_REQUEST['factNIF']) ? $_REQUEST['factNIF'] : 'NO validado';
$fact_ciudad = isset($_REQUEST['fact_ciudad']) ? $_REQUEST['fact_ciudad'] : 'NO validado';

/* QUERY. Actualización del cliente:
	1. La tabla de clientes
	2. La tabla de coches
	3. Tabla de direcciones */
$query= "UPDATE pruebas_clientes SET nombre='$nombre', variado='$variado', tlf1='$tlf1', tlf2='$tlf2', email='$email1', email2='$email2' WHERE id_cliente='$id_cliente' ";
mysqli_query($link, $query);

/*2. La tabla de coches*/
/*3. La tabla de direcciones*/
//Obtener antes el id_direccion que hay que modificar (Es necesario con el id_cliente???? Sí
$query= "UPDATE pruebas_direcciones SET calle='$envio_calle', cp='$envioCP', ciudad='$envio_ciudad' WHERE id_cliente='$id_cliente' AND E_F='E' ";
mysqli_query($link, $query);  

$query= "UPDATE pruebas_direcciones SET calle='$fact_calle', cp='$factCP', ciudad='$fact_ciudad', nif='$factNIF' WHERE id_cliente='$id_cliente' AND E_F='F' ";  
mysqli_query($link, $query);  

echo 1;


 
