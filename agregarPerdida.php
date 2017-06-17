<?php

header('Access-Control-Allow-Origin: *');
include 'inc/conexion.php';

extract($_POST); 
$pedido = utf8_decode(trim($pedido));
$concepto = utf8_decode(trim($concepto));
$coste = utf8_decode(trim($coste));
$fecha = utf8_decode(trim($fecha));


//Distinguir entre inserción y actualización mediante el campo $pedido recibido
$query = "SELECT * FROM pruebas_perdidas WHERE id_pedido='$pedido'";
$result = mysqli_query($link, $query);
if (mysqli_num_rows($result)>0){
    //Ya existe
    $query= "UPDATE pruebas_perdidas SET id_pedido='$pedido', concepto= '$concepto', coste= '$coste', fecha='$fecha' WHERE id_pedido='$pedido'";
    $result=  mysqli_query($link, $query);
    echo -1;
}else{
    //no existe. Insertar
    $query = "INSERT INTO pruebas_perdidas (id_pedido, concepto, coste, fecha) VALUES ('$pedido', '$concepto', '$coste', STR_TO_DATE('$fecha', '%d/%m/%Y'))";
	//echo $query;
	$result = mysqli_query($link, $query);
    echo 1;
}





