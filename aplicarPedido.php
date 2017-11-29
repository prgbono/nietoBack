<?php
header("Content-Type: text/html;charset=utf-8");
header('Access-Control-Allow-Origin: *');
include 'inc/conexion.php';
extract($_POST);

$id_pedido = utf8_decode(isset($_POST['id_pedido']) ? $_POST['id_pedido'] : NULL); 
$fra_env = utf8_decode(isset($_POST['fra_env']) ? $_POST['fra_env'] : NULL); 
$inter = utf8_decode(isset($_POST['inter']) ? $_POST['inter'] : NULL); 
$recog = utf8_decode(isset($_POST['recog']) ? $_POST['recog'] : NULL); 
$fianza = utf8_decode(isset($_POST['fianza']) ? $_POST['fianza'] : NULL); 
$pagado = utf8_decode(isset($_POST['pagado']) ? $_POST['pagado'] : NULL); 
$cambio = utf8_decode(isset($_POST['cambio']) ? $_POST['cambio'] : NULL); 
$beneficio = utf8_decode(isset($_POST['beneficio']) ? $_POST['beneficio'] : NULL); 

//Cálculo de beneficio dependiendo de pagado
//SI PAGADO != 0 query para obtener el subtotal y calcular el beneficio = subtotal - (pagado / cambio)

if($pagado!=0){    
    $query= "UPDATE pruebas_pedidos t1 INNER JOIN pruebas_pedidos t2 ON t2.id_pedido = t1.id_pedido SET t1.fra_env='$fra_env', t1.inter='$inter', t1.recog='$recog', t1.fianza='$fianza', t1.pagado='$pagado', t1.cambio='$cambio', t1.beneficio = t2.subtotal - ('$pagado'/ '$cambio') WHERE t1.id_pedido='$id_pedido'";
}
else{
	$query= "UPDATE pruebas_pedidos SET fra_env='$fra_env', inter='$inter', recog='$recog', fianza='$fianza', pagado='$pagado', cambio='$cambio', beneficio='$beneficio' WHERE id_pedido='$id_pedido' ";
}

$result = mysqli_query($link, $query);

$query= "SELECT beneficio FROM pruebas_pedidos WHERE id_pedido='$id_pedido'";
$result = mysqli_query($link, $query);


$fila= mysqli_fetch_assoc($result);
echo $fila['beneficio'];  
/*
$output= array();
while ($fila = mysqli_fetch_assoc($resultSEL)){
    $output[]=array_map('utf8_encode', $fila);
}

//echo json_encode($output);
echo '{"Beneficio":'.json_encode($output).'}';*/





