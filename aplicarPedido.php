<?php
header('Access-Control-Allow-Origin: *');
include 'inc/conexion.php';
extract($_POST);

$id_pedido = isset($_POST['id_pedido']) ? $_POST['id_pedido'] : NULL; 
$fra_env = isset($_POST['fra_env']) ? $_POST['fra_env'] : NULL; 
$inter = isset($_POST['inter']) ? $_POST['inter'] : NULL; 
$recog = isset($_POST['recog']) ? $_POST['recog'] : NULL; 
$fianza = isset($_POST['fianza']) ? $_POST['fianza'] : NULL; 
$pagado = isset($_POST['pagado']) ? $_POST['pagado'] : NULL; 
$cambio = isset($_POST['cambio']) ? $_POST['cambio'] : NULL; 
$beneficio = isset($_POST['beneficio']) ? $_POST['beneficio'] : NULL; 

$query= "UPDATE pruebas_pedidos SET fra_env='$fra_env', inter='$inter', recog='$recog', fianza='$fianza', pagado='$pagado', cambio='$cambio', beneficio='$beneficio' WHERE id_pedido='$id_pedido' ";

$result = mysqli_query($link, $query);
echo mysqli_num_rows($result);












 
