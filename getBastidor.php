<?php
header("Content-Type: text/html;charset=utf-8");
header('Access-Control-Allow-Origin: *');
include ('../nietoBack/inc/conexion.php');

$id_vehiculo = isset($_POST['id_vehiculo']) ? $_POST['id_vehiculo'] : 0;  
$bastidor="SELECT bastidor FROM pruebas_coches WHERE id_coche = '$id_vehiculo'";
$result = mysqli_query($link, $bastidor);

if(mysqli_num_rows($result)==0){
    echo -1; //Se ha equivocao
}else{
    $bastidor= mysqli_fetch_assoc($result);
    echo $bastidor['bastidor']; //devuelve el bastidor del coche 
}
