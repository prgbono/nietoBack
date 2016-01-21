<?php

header('Access-Control-Allow-Origin: *');

//Incluir el fichero de conexión para conectar con la BBDD
include 'inc/conexion.php';

// Obtener los datos que nos envía jquery 
extract($_REQUEST); //A partir de esta línea tenemos disponibles unas variables que se llaman igual que el atributo name de los inputs del formulario. 


echo ($_REQUEST['descripcion'][0] + $_REQUEST['check'][1] + $_REQUEST['precio'][2]+ $_REQUEST['pvp'][3] + $_REQUEST['dto'][4] + $_REQUEST['total'][5] + $_REQUEST['uds'][6]);




