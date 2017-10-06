<?php
header("Content-Type: text/html;charset=utf-8");
header('Access-Control-Allow-Origin: *');
include 'inc/conexion.php';

$id_ped = isset($_POST['id_ped']) ? $_POST['id_ped'] : NULL;
//$sql = "SELECT * FROM pruebas_pedidos WHERE id_pedido = $id_ped";

$sql = "SELECT pruebas_pedidos.id_ppto, DATE_FORMAT(pruebas_pedidos.fecha, '%d-%m-%Y') as fecha, 
    pruebas_coches.modelo as coche, pruebas_coches.bastidor as bastidor, pruebas_clientes.nombre as cliente,pruebas_pedidos.id_fra, pruebas_pedidos.anul, pruebas_pedidos.id_pedido, pruebas_pedidos.generado, pruebas_pedidos.beneficio, pruebas_pedidos.cambio, pruebas_pedidos.fianza, pruebas_pedidos.fra_env, pruebas_pedidos.inter, pruebas_pedidos.pagado, pruebas_pedidos.recog, pruebas_pedidos.subtotal, pruebas_pedidos.iva, pruebas_pedidos.total, pruebas_pedidos.asunto, pruebas_pedidos.transporte
    FROM (pruebas_pedidos LEFT JOIN pruebas_clientes ON pruebas_pedidos.id_cliente = pruebas_clientes.id_cliente) LEFT JOIN pruebas_coches ON pruebas_pedidos.id_cliente = pruebas_coches.id_cliente 
    WHERE id_pedido = $id_ped ";

$result = mysqli_query($link, $sql);

$output= array();
while ($fila = mysqli_fetch_assoc($result)){
    $output[]=array_map('utf8_encode', $fila);
}

//echo $id_ped;
echo '{"Pedido":'.json_encode($output).'}';
