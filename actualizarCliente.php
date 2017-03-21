<?php
header('Access-Control-Allow-Origin: *');

include 'inc/conexion.php';

extract($_REQUEST);

$id_cliente = isset($_REQUEST['id_cliente']) ? $_REQUEST['id_cliente'] : NULL; 

//UTF-8 -- TRAERLO Y DECODIFICARLO EN UN ARRAY PQ NO SÉ LAS VARIABLES QUE VA A TRAER!!!
$nombre = isset($_REQUEST['input_nombre']) ? $_REQUEST['input_nombre'] : 'NO validado'; 
$modelo_coche = isset($_REQUEST['input_coche']) ? $_REQUEST['input_coche'] : '';
$bastidor = isset($_REQUEST['input_bastidor']) ? $_REQUEST['input_bastidor'] : '';
$anio_coche = isset($_REQUEST['input_anio_coche']) ? $_REQUEST['input_anio_coche'] : '';
$variado = isset($_REQUEST['input_variado']) ? $_REQUEST['input_variado'] : 'NO validado';
$tlf1 = isset($_REQUEST['input_tlf1']) ? $_REQUEST['input_tlf1'] : 'NO validado';
$email1 = isset($_REQUEST['input_email1']) ? $_REQUEST['input_email1'] : 'NO validado';
$ciudad = isset($_REQUEST['input_ciudad']) ? $_REQUEST['input_ciudad'] : '';
$envio_calle = isset($_REQUEST['envio_calle']) ? $_REQUEST['envio_calle'] : 'NO validado';
$envioCP = isset($_REQUEST['envioCP']) ? $_REQUEST['envioCP'] : 'NO validado';
$envio_ciudad = isset($_REQUEST['envio_ciudad']) ? $_REQUEST['envio_ciudad'] : 'NO validado';
$fact_calle = isset($_REQUEST['fact_calle']) ? $_REQUEST['fact_calle'] : 'NO validado';
$factCP = isset($_REQUEST['factCP']) ? $_REQUEST['factCP'] : 'NO validado';
$factNIF = isset($_REQUEST['factNIF']) ? $_REQUEST['factNIF'] : 'NO validado';
$fact_ciudad = isset($_REQUEST['fact_ciudad']) ? $_REQUEST['fact_ciudad'] : 'NO validado';

/* QUERY. Actualización del cliente:
	1. La tabla de clientes
	2. La tabla de coches
	3. Tabla de direcciones */
$query= "UPDATE pruebas_clientes SET nombre='$nombre', variado='$variado', tlf1='$tlf1', email='$email1', ciudad='$ciudad' WHERE id_cliente='$id_cliente' ";
mysqli_query($link, $query);

/*2. La tabla de coches*/
$query= "UPDATE pruebas_coches SET modelo='$modelo_coche', bastidor='$bastidor', anio='$anio_coche' WHERE id_cliente='$id_cliente' AND ppal=1";
mysqli_query($link, $query);  

/*3. La tabla de direcciones*/
//Obtener antes el id_direccion que hay que modificar (Es necesario con el id_cliente???? Sí
$query= "UPDATE pruebas_direcciones SET calle='$envio_calle', cp='$envioCP', ciudad='$envio_ciudad' WHERE id_cliente='$id_cliente' AND E_F='E' ";
mysqli_query($link, $query);  

$query= "UPDATE pruebas_direcciones SET calle='$fact_calle', cp='$factCP', ciudad='$fact_ciudad', nif='$factNIF' WHERE id_cliente='$id_cliente' AND E_F='F' ";  
mysqli_query($link, $query);  

echo 1;


 
