<?php
header('Access-Control-Allow-Origin: *');

//1.Incluir el fichero de conexión para conectar con la BBDD
include 'inc/conexion.php';

extract($_REQUEST);
//extract(utf8_decode($_REQUEST)); //A partir de esta línea tenemos disponibles unas variables que se llaman igual que el atributo name de los inputs del formulario. 

$id_pedido = isset($_REQUEST['id_pedido']) ? $_REQUEST['id_pedido'] : NULL; 
$id_pedido = isset($_REQUEST['id_pedido']) ? $_REQUEST['id_pedido'] : NULL; 
$id_pedido = isset($_REQUEST['id_pedido']) ? $_REQUEST['id_pedido'] : NULL; 
$id_pedido = isset($_REQUEST['id_pedido']) ? $_REQUEST['id_pedido'] : NULL; 
$id_pedido = isset($_REQUEST['id_pedido']) ? $_REQUEST['id_pedido'] : NULL; 
$id_pedido = isset($_REQUEST['id_pedido']) ? $_REQUEST['id_pedido'] : NULL; 
$id_pedido = isset($_REQUEST['id_pedido']) ? $_REQUEST['id_pedido'] : NULL; 


$query= "UPDATE pruebas_pedidos SET fra_env='$fra_env', inter='$inter', recog='$recog', fianza='$fianza', pagado='$pagado', cambio='$cambio', beneficio='$beneficio', anul='$anul' WHERE id_pedido='$id_pedido' ";
/*mysqli_query($link, $query);*/

echo $query;

//echo 1;






 
