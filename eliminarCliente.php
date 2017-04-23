<?php
header('Access-Control-Allow-Origin: *');
include 'inc/conexion.php';
//Obtener la id del cliente que nos envía jquery
extract($_POST);

$query = "DELETE FROM pruebas_clientes WHERE id_cliente=$id_cliente";
/* OJOOOOO
Al borrar un cliente se desencadenan dos disparadores en la BBDD local. El primero sobre la tabla pruebas_clientes, que borra todos los registros con el id_cliente = al id del cliente borrado pero en la tabla pruebas_coches. El segundo sobre la tabla pruebas_coches, que borra todos los registros con el mismo id_cliente que el borrado en la tabla pruebas_direcciones. La versión de phpMyadmin que tengo no permite poner los dos disparadores sobre la tablas de clientes.
*/
//ejecutamos y devuelve el nº de filas afectadas
echo mysqli_query($link, $query);