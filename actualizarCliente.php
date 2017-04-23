<?php
header('Access-Control-Allow-Origin: *');

include 'inc/conexion.php';

extract($_POST);

$id_cliente = isset($_POST['id_cliente']) ? $_POST['id_cliente'] : NULL; 

//UTF-8 -- TRAERLO Y DECODIFICARLO EN UN ARRAY PQ NO SÉ LAS VARIABLES QUE VA A TRAER!!!
$nombre = isset($_POST['input_nombre']) ? $_POST['input_nombre'] : 'NO validado'; 
$modelo_coche = isset($_POST['input_coche']) ? $_POST['input_coche'] : '';
$bastidor = isset($_POST['input_bastidor']) ? $_POST['input_bastidor'] : '';
$anio_coche = isset($_POST['input_anio_coche']) ? $_POST['input_anio_coche'] : '';
$variado = isset($_POST['input_variado']) ? $_POST['input_variado'] : 'NO validado';
$tlf1 = isset($_POST['input_tlf1']) ? $_POST['input_tlf1'] : 'NO validado';
$email1 = isset($_POST['input_email1']) ? $_POST['input_email1'] : 'NO validado';
$ciudad = isset($_POST['input_ciudad']) ? $_POST['input_ciudad'] : '';
$envio_calle = isset($_POST['envio_calle']) ? $_POST['envio_calle'] : 'NO validado';
$envioCP = isset($_POST['envioCP']) ? $_POST['envioCP'] : 'NO validado';
$envio_ciudad = isset($_POST['envio_ciudad']) ? $_POST['envio_ciudad'] : 'NO validado';
$fact_calle = isset($_POST['fact_calle']) ? $_POST['fact_calle'] : 'NO validado';
$factCP = isset($_POST['factCP']) ? $_POST['factCP'] : 'NO validado';
$factNIF = isset($_POST['factNIF']) ? $_POST['factNIF'] : 'NO validado';
$fact_ciudad = isset($_POST['fact_ciudad']) ? $_POST['fact_ciudad'] : 'NO validado';

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


 
