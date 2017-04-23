<?php
header('Access-Control-Allow-Origin: *');

//BBDD connect
include 'inc/conexion.php';

//cadena a buscar en los nombres de clientes caso que se informe
$keyword = isset($_POST['keyword']) ? '%'.$_POST['keyword'].'%' : NULL;

//Esta parte sobra, no entra en este caso nunca
if(is_null($keyword)){
    $sql = "SELECT * FROM pruebas_clientes ORDER BY nombre";
}
else{
    $sql = "SELECT * FROM pruebas_clientes LEFT JOIN pruebas_coches ON pruebas_clientes.id_cliente = pruebas_coches.id_cliente WHERE nombre LIKE '$keyword' or modelo LIKE '$keyword' or variado LIKE '$keyword' or email LIKE '$keyword' or ciudad LIKE '$keyword' ORDER BY nombre";
    /*$sql = "SELECT * FROM pruebas_direcciones, pruebas_clientes LEFT JOIN pruebas_coches ON pruebas_clientes.id_cliente = pruebas_coches.id_cliente WHERE nombre LIKE '$keyword' or modelo LIKE '$keyword' or variado LIKE '$keyword' or email LIKE '$keyword' or pruebas_direcciones.ciudad LIKE '$keyword' ORDER BY nombre";*/
}
$result = mysqli_query($link, $sql);
$output= array();
while($fila = mysqli_fetch_assoc($result)){
    //$output[]= $fila; Con esta instrucción bastaría pero los registros con tildes los pone a null
    $output[]=array_map('utf8_encode', $fila);
}
echo '{"Clientes":'.json_encode($output).'}';





    









