<?php
header('Access-Control-Allow-Origin: *');

//BBDD connect
/*include 'inc/conexion.php';*/

/*PRODUCCIÓN*/
include ('../nietoBack/inc/conexion.php');

$id_vehiculo = isset($_REQUEST['id_vehiculo']) ? $_REQUEST['id_vehiculo'] : 0;  
$bastidor="SELECT bastidor FROM pruebas_coches WHERE id_coche = '$id_vehiculo'";
$result = mysqli_query($link, $bastidor);

/*echo $bastidor;*/

if(mysqli_num_rows($result)==0){
    echo -1; //Se ha equivocao
}else{
    $bastidor= mysqli_fetch_assoc($result);
    echo $bastidor['bastidor']; //devuelve el bastidor del coche 
}
