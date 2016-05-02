<?php
header('Access-Control-Allow-Origin: *');

//BBDD connect
include 'inc/conexion.php';

//cadena a buscar caso que venga del buscador
$keyword = isset($_REQUEST['keyword']) ? '%'.$_REQUEST['keyword'].'%' : NULL;
//cliente a filtrar caso que venga del botón listar presupuestos de un cliente determinado en la pantalla Listado de clientes.
//Si no viene cliente que sea 0 y por ese 0 filtramos la consulta
$cliente = isset($_REQUEST['cliente']) ? $_REQUEST['cliente'] : 0;

$sql_tri1="SELECT pruebas_pedidos.id_pedido, pruebas_pedidos.fecha, pruebas_pedidos.id_fra, pruebas_coches.modelo as id_coche, pruebas_clientes.nombre as id_cliente, pruebas_pedidos.total, pruebas_pedidos.fra_env, pruebas_pedidos.inter, pruebas_pedidos.recog, pruebas_pedidos.fianza, pruebas_pedidos.pagado, pruebas_pedidos.cambio, pruebas_pedidos.beneficio, pruebas_pedidos.anul, pruebas_pedidos.iva, pruebas_pedidos.subtotal FROM (pruebas_pedidos LEFT JOIN pruebas_clientes ON pruebas_pedidos.id_cliente = pruebas_clientes.id_cliente) LEFT JOIN pruebas_coches ON pruebas_clientes.id_cliente = pruebas_coches.id_cliente WHERE date(pruebas_pedidos.fecha) BETWEEN '".date("Y")."-01-01 00:00:00' AND '".date("Y")."-03-31 23:59:59' ";

$sql_tri2="SELECT pruebas_pedidos.id_pedido, pruebas_pedidos.fecha, pruebas_pedidos.id_fra, pruebas_coches.modelo as id_coche, pruebas_clientes.nombre as id_cliente, pruebas_pedidos.total, pruebas_pedidos.fra_env, pruebas_pedidos.inter, pruebas_pedidos.recog, pruebas_pedidos.fianza, pruebas_pedidos.pagado, pruebas_pedidos.cambio, pruebas_pedidos.beneficio, pruebas_pedidos.anul, pruebas_pedidos.iva, pruebas_pedidos.subtotal FROM (pruebas_pedidos LEFT JOIN pruebas_clientes ON pruebas_pedidos.id_cliente = pruebas_clientes.id_cliente) LEFT JOIN pruebas_coches ON pruebas_clientes.id_cliente = pruebas_coches.id_cliente WHERE date(pruebas_pedidos.fecha) BETWEEN '".date("Y")."-04-01 00:00:00' AND '".date("Y")."-06-30 23:59:59' ";

$sql_tri3="SELECT pruebas_pedidos.id_pedido, pruebas_pedidos.fecha, pruebas_pedidos.id_fra, pruebas_coches.modelo as id_coche, pruebas_clientes.nombre as id_cliente, pruebas_pedidos.total, pruebas_pedidos.fra_env, pruebas_pedidos.inter, pruebas_pedidos.recog, pruebas_pedidos.fianza, pruebas_pedidos.pagado, pruebas_pedidos.cambio, pruebas_pedidos.beneficio, pruebas_pedidos.anul, pruebas_pedidos.iva, pruebas_pedidos.subtotal FROM (pruebas_pedidos LEFT JOIN pruebas_clientes ON pruebas_pedidos.id_cliente = pruebas_clientes.id_cliente) LEFT JOIN pruebas_coches ON pruebas_clientes.id_cliente = pruebas_coches.id_cliente WHERE date(pruebas_pedidos.fecha) BETWEEN '".date("Y")."-07-01 00:00:00' AND '".date("Y")."-09-30 23:59:59' ";

 $sql_tri4="SELECT pruebas_pedidos.id_pedido, pruebas_pedidos.fecha, pruebas_pedidos.id_fra, pruebas_coches.modelo as id_coche, pruebas_clientes.nombre as id_cliente, pruebas_pedidos.total, pruebas_pedidos.fra_env, pruebas_pedidos.inter, pruebas_pedidos.recog, pruebas_pedidos.fianza, pruebas_pedidos.pagado, pruebas_pedidos.cambio, pruebas_pedidos.beneficio, pruebas_pedidos.anul, pruebas_pedidos.iva, pruebas_pedidos.subtotal FROM (pruebas_pedidos LEFT JOIN pruebas_clientes ON pruebas_pedidos.id_cliente = pruebas_clientes.id_cliente) LEFT JOIN pruebas_coches ON pruebas_clientes.id_cliente = pruebas_coches.id_cliente WHERE date(pruebas_pedidos.fecha) BETWEEN '".date("Y")."-10-01 00:00:00' AND '".date("Y")."-12-31 23:59:59' ";

 $sql_PedTotal="SELECT pruebas_pedidos.id_pedido, pruebas_pedidos.fecha, pruebas_pedidos.id_fra, pruebas_coches.modelo as id_coche, pruebas_clientes.nombre as id_cliente, pruebas_pedidos.total, pruebas_pedidos.fra_env, pruebas_pedidos.inter, pruebas_pedidos.recog, pruebas_pedidos.fianza, pruebas_pedidos.pagado, pruebas_pedidos.cambio, pruebas_pedidos.beneficio, pruebas_pedidos.anul, pruebas_pedidos.iva, pruebas_pedidos.subtotal FROM (pruebas_pedidos LEFT JOIN pruebas_clientes ON pruebas_pedidos.id_cliente = pruebas_clientes.id_cliente) LEFT JOIN pruebas_coches ON pruebas_clientes.id_cliente = pruebas_coches.id_cliente WHERE date(pruebas_pedidos.fecha) not BETWEEN '".date("Y")."-01-01 00:00:00' AND '".date("Y")."-12-31 23:59:59' ";

//AND (pruebas_clientes.id_cliente = '$cliente') ORDER BY pruebas_pedidos.fecha";

if($cliente!=0){    

    $sql_tri1= $sql_tri1."AND (pruebas_clientes.id_cliente = '$cliente') ORDER BY pruebas_pedidos.fecha";
    $sql_tri2= $sql_tri2."AND (pruebas_clientes.id_cliente = '$cliente') ORDER BY pruebas_pedidos.fecha";
    $sql_tri3= $sql_tri3."AND (pruebas_clientes.id_cliente = '$cliente') ORDER BY pruebas_pedidos.fecha";
    $sql_tri4= $sql_tri4."AND (pruebas_clientes.id_cliente = '$cliente') ORDER BY pruebas_pedidos.fecha";
    $sql_PedTotal= $sql_PedTotal."AND (pruebas_clientes.id_cliente = '$cliente') ORDER BY pruebas_pedidos.fecha";    

}
else{
    if(is_null($keyword)){
    //sql's de los 4 trimestres del año en curso y del resto de pedidos de otros años
        $sql_tri1 = $sql_tri1."ORDER BY pruebas_pedidos.fecha";
        $sql_tri2 = $sql_tri2."ORDER BY pruebas_pedidos.fecha";
        $sql_tri3 = $sql_tri3."ORDER BY pruebas_pedidos.fecha";
        $sql_tri4 = $sql_tri4."ORDER BY pruebas_pedidos.fecha";
        $sql_PedTotal = $sql_PedTotal."ORDER BY pruebas_pedidos.fecha";
    }
    else
    {
        //ESTE ELSE NO RULA! Hay que buscar en el resultado de la consulta de las vbles de trimestres, no de las tablas estáticas
        $sql_tri1 = $sql_tri1."AND (pruebas_pedidos.id_pedido LIKE '$keyword' or pruebas_pedidos.fecha LIKE '$keyword' or pruebas_pedidos.id_fra LIKE '$keyword' or pruebas_coches.modelo LIKE '$keyword' or pruebas_clientes.nombre LIKE '$keyword')";
        $sql_tri2 = $sql_tri2."AND (pruebas_pedidos.id_pedido LIKE '$keyword' or pruebas_pedidos.fecha LIKE '$keyword' or pruebas_pedidos.id_fra LIKE '$keyword' or pruebas_coches.modelo LIKE '$keyword' or pruebas_clientes.nombre LIKE '$keyword')";
        $sql_tri3 = $sql_tri3."AND (pruebas_pedidos.id_pedido LIKE '$keyword' or pruebas_pedidos.fecha LIKE '$keyword' or pruebas_pedidos.id_fra LIKE '$keyword' or pruebas_coches.modelo LIKE '$keyword' or pruebas_clientes.nombre LIKE '$keyword')";
        $sql_tri4 = $sql_tri4."AND (pruebas_pedidos.id_pedido LIKE '$keyword' or pruebas_pedidos.fecha LIKE '$keyword' or pruebas_pedidos.id_fra LIKE '$keyword' or pruebas_coches.modelo LIKE '$keyword' or pruebas_clientes.nombre LIKE '$keyword')";
        $sql_PedTotal = $sql_PedTotal. "AND (pruebas_pedidos.id_pedido LIKE '$keyword' or pruebas_pedidos.fecha LIKE '$keyword' or pruebas_pedidos.id_fra LIKE '$keyword' or pruebas_coches.modelo LIKE '$keyword' or pruebas_clientes.nombre LIKE '$keyword')";
    }
}


//ejecutamos
$result1 = mysqli_query($link, $sql_tri1);
$result2 = mysqli_query($link, $sql_tri2);
$result3 = mysqli_query($link, $sql_tri3);
$result4 = mysqli_query($link, $sql_tri4);
$resultPedTotal = mysqli_query($link, $sql_PedTotal);


//JSON
$output1= array();
while($fila = mysqli_fetch_assoc($result1)){
    //$output[]= $fila; Con esta instrucción bastaría pero los registros con tildes los pone a null
    $output1[]=array_map('utf8_encode', $fila);
}

$output2= array();
while($fila = mysqli_fetch_assoc($result2)){
    $output2[]=array_map('utf8_encode', $fila);
}

$output3= array();
while($fila = mysqli_fetch_assoc($result3)){
    $output3[]=array_map('utf8_encode', $fila);
}

$output4= array();
while($fila = mysqli_fetch_assoc($result4)){
    $output4[]=array_map('utf8_encode', $fila);
}

$outputPedTotal= array();
while($fila = mysqli_fetch_assoc($resultPedTotal)){
    $outputPedTotal[]=array_map('utf8_encode', $fila);
}

    //Falta el close connection mysqli_close(mysqli_connect($host, $user, $password, $database)) or die("Error en la DCX");

echo '{"Pedidos":'.json_encode(array($output1, $output2, $output3, $output4, $outputPedTotal)).'}';





