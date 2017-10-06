<?php
header("Content-Type: text/html;charset=utf-8");
header('Access-Control-Allow-Origin: *');
include 'inc/conexion.php';

//cadena a buscar caso que venga del buscador
$keyword = isset($_POST['keyword']) ? '%'.$_POST['keyword'].'%' : NULL;

//cliente a filtrar caso que venga del botón listar presupuestos de un cliente determinado en la pantalla Listado de clientes.
//Si no viene cliente que sea 0 y por ese 0 filtramos la consulta
$cliente = isset($_POST['cliente']) ? $_POST['cliente'] : 0;

$id_ppto = isset($_POST['id_ppto']) ? $_POST['id_ppto'] : NULL;

$sqlBase = "SELECT pruebas_presupuestos.id_ppto, DATE_FORMAT(pruebas_presupuestos.fecha, '%d-%m-%Y') as fecha, pruebas_coches.modelo as id_coche, pruebas_clientes.nombre as id_cliente, pruebas_presupuestos.id_cliente as clienteId, pruebas_presupuestos.asunto, pruebas_presupuestos.total, pruebas_presupuestos.transporte, 
	pruebas_presupuestos.canarias, pruebas_presupuestos.subtotal, pruebas_presupuestos.iva FROM (pruebas_presupuestos LEFT JOIN pruebas_clientes ON pruebas_presupuestos.id_cliente = pruebas_clientes.id_cliente) LEFT JOIN pruebas_coches ON pruebas_presupuestos.id_coche = pruebas_coches.id_coche ";


if($cliente!=0){
    $sql=$sqlBase . "WHERE pruebas_presupuestos.id_cliente = '$cliente' ";
}
else{
	if (is_null($keyword)){
		$sql = $sqlBase;
	}
	else{
		$sql = $sqlBase . "WHERE (pruebas_presupuestos.id_ppto LIKE '$keyword' or pruebas_presupuestos.fecha LIKE '$keyword' or 
			pruebas_presupuestos.id_coche LIKE '$keyword' or pruebas_presupuestos.id_cliente LIKE '$keyword' 
			or pruebas_presupuestos.total LIKE '$keyword' or pruebas_clientes.nombre LIKE '$keyword' 
			or pruebas_presupuestos.asunto LIKE '$keyword')";
	}   
}

if (!is_null($id_ppto)){
	$sql = $sqlBase . "WHERE id_ppto = ".$id_ppto;
} 

$sql.= " ORDER BY id_ppto DESC ";
$result = mysqli_query($link, $sql);

$output= array();
while($fila = mysqli_fetch_assoc($result)){
    //$output[]= $fila; Con esta instrucción bastaría pero los registros con tildes los pone a null
    $output[]=array_map('utf8_encode', $fila);

}
echo '{"Presupuestos":'.json_encode($output).'}';






