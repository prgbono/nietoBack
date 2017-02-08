<?php
header('Access-Control-Allow-Origin: *');
include 'inc/conexion.php';
extract ($_REQUEST); 
$query= "SELECT * FROM usuarios WHERE usuario='$usuario' AND pass='$password'";
$result = mysqli_query($link, $query);

if(mysqli_num_rows($result)==0){
    echo -1; //Se ha equivocao el tío, no hay usuario y contraseña así
}else{
    echo 1;
}

