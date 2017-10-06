<?php
header("Content-Type: text/html;charset=utf-8");
header('Access-Control-Allow-Origin: *');
include 'inc/conexion.php';

extract($_POST); 
$partNumber = utf8_decode(trim($partNumber));
$title = utf8_decode(trim($title));
$titulo = utf8_decode(trim($titulo));
$gbp = utf8_decode(trim($gbp));

//Distinguir entre inserción y actualización mediante el campo part_number recibido
$query = "SELECT * FROM pruebas_bbdd WHERE part_number='$partNumber'";
$result = mysqli_query($link, $query);
if (mysqli_num_rows($result)>0){
    //Ya existe
    $query= "UPDATE pruebas_bbdd SET part_number='$partNumber', title= '$title', sp_title= '$titulo', gbp='$gbp' WHERE part_number= '$partNumber'";
    $result=  mysqli_query($link, $query);
    echo -1;
}else{
    //no existe. Insertar
    $query= "INSERT INTO pruebas_bbdd (part_number, title, sp_title, gbp) VALUES ('$partNumber', '$title', '$titulo', '$gbp')";
    $result=  mysqli_query($link, $query);
    echo 1;
}

