<?php
header('Access-Control-Allow-Origin: *');

//1.Incluir el fichero de conexión para conectar con la BBDD
include 'inc/conexion.php';

extract($_REQUEST);
//extract(utf8_decode($_REQUEST)); //A partir de esta línea tenemos disponibles unas variables que se llaman igual que el atributo name de los inputs del formulario. 

$id_pedido = isset($_REQUEST['id_pedido']) ? $_REQUEST['id_pedido'] : NULL; 
$fra_env = isset($_REQUEST['fra_env']) ? $_REQUEST['fra_env'] : NULL; 
$inter = isset($_REQUEST['inter']) ? $_REQUEST['inter'] : NULL; 
$recog = isset($_REQUEST['recog']) ? $_REQUEST['recog'] : NULL; 
$fianza = isset($_REQUEST['fianza']) ? $_REQUEST['fianza'] : NULL; 
$pagado = isset($_REQUEST['pagado']) ? $_REQUEST['pagado'] : NULL; 
$cambio = isset($_REQUEST['cambio']) ? $_REQUEST['cambio'] : NULL; 
$beneficio = isset($_REQUEST['beneficio']) ? $_REQUEST['beneficio'] : NULL; 
/*$anul = isset($_REQUEST['anul']) ? $_REQUEST['anul'] : NULL; */

$query= "UPDATE pruebas_pedidos SET fra_env='$fra_env', inter='$inter', recog='$recog', fianza='$fianza', pagado='$pagado', cambio='$cambio', beneficio='$beneficio' WHERE id_pedido='$id_pedido' ";

$result = mysqli_query($link, $query);
//echo $query;

//echo mysqli_num_rows($result) ;






 
