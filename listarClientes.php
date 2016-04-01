<?php
header('Access-Control-Allow-Origin: *');

//BBDD connect
include 'inc/conexion.php';

//Obtener la id del user que nos envía jquery
//extract($_REQUEST);
        
//sql
/*$sql="select * from pruebas_clientes ORDER BY nombre";*/
$sql="SELECT pruebas_clientes.id_cliente, pruebas_clientes.nombre, pruebas_coches.modelo as coche, pruebas_clientes.variado, pruebas_clientes.tlf1, pruebas_clientes.tlf2, pruebas_clientes.email, pruebas_clientes.email2, pruebas_clientes.ciudad FROM pruebas_clientes INNER JOIN pruebas_coches ON pruebas_clientes.id_cliente = pruebas_coches.id_cliente";

//ejecutamos
$result = mysqli_query($link, $sql);

//JSON
$output= array();
while($fila = mysqli_fetch_assoc($result)){
    //$output[]= $fila; Con esta instrucción bastaría pero los registros con tildes los pone a null
    $output[]=array_map('utf8_encode', $fila);

}

    //Falta el close connection mysqli_close(mysqli_connect($host, $user, $password, $database)) or die("Error en la DCX");

echo '{"Clientes":'.json_encode($output).'}';


