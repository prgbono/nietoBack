<?php

//Conexión con la BBDD

$database = "nieto";
$user = "root";
$password = "root";
$server = "localhost";
//RASPI
//$password = "pacorios1982";

/*$database = "db634677685";
$user = "dbo634677685";
$password = "1432357@Nieto";
$server = "db634677685.db.1and1.com";*/
//$server = "localhost";


//Conexión
$link = mysqli_connect($server, $user, $password, $database);

