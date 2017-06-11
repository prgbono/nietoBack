<?php
header('Access-Control-Allow-Origin: *');
include 'inc/conexion.php';

$sql="SELECT pruebas_pedidos.id_pedido, pruebas_pedidos.id_ppto, DATE_FORMAT(pruebas_pedidos.fecha, '%d-%m-%Y') as fecha, pruebas_pedidos.id_fra, pruebas_coches.modelo as id_coche, pruebas_clientes.nombre as id_cliente, pruebas_clientes.id_cliente as clienteId, pruebas_pedidos.total, pruebas_pedidos.fra_env, pruebas_pedidos.inter, pruebas_pedidos.recog, pruebas_pedidos.fianza, pruebas_pedidos.pagado, pruebas_pedidos.cambio, pruebas_pedidos.beneficio, pruebas_pedidos.anul, pruebas_pedidos.iva, pruebas_pedidos.subtotal, pruebas_pedidos.trimestre FROM (pruebas_pedidos LEFT JOIN pruebas_clientes ON pruebas_pedidos.id_cliente = pruebas_clientes.id_cliente) LEFT JOIN pruebas_coches ON pruebas_clientes.id_cliente = pruebas_coches.id_cliente WHERE anul = 'S'";

$result = mysqli_query($link, $sql);
$output= array();
while($fila = mysqli_fetch_assoc($result)){
    $output[]=array_map('utf8_encode', $fila);

}
echo '{"Anulaciones":'.json_encode($output).'}';
