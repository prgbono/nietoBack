<?php
header("Content-Type: text/html;charset=utf-8");
header('Access-Control-Allow-Origin: *');
include 'inc/conexion.php';

$sql="SELECT DISTINCT pruebas_clientes.id_cliente, pruebas_clientes.nombre, pruebas_coches.modelo as coche, pruebas_clientes.variado, pruebas_clientes.tlf1, pruebas_clientes.tlf2, pruebas_clientes.email, pruebas_clientes.email2, pruebas_clientes.ciudad FROM pruebas_clientes LEFT JOIN pruebas_coches ON pruebas_clientes.id_cliente = pruebas_coches.id_cliente ORDER BY pruebas_clientes.nombre";

$result = mysqli_query($link, $sql);

$output= array();
while($fila = mysqli_fetch_assoc($result)){
    $output[]=array_map('utf8_encode', $fila);

}
echo '{"Clientes":'.json_encode($output).'}';


