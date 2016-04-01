<?php
header('Access-Control-Allow-Origin: *');

//BBDD connect
include 'inc/conexion.php';

//cadena a buscar caso que venga del buscador
$keyword = isset($_REQUEST['keyword']) ? '%'.$_REQUEST['keyword'].'%' : NULL;

//cliente a filtrar caso que venga del botón listar presupuestos de un cliente determinado en la pantalla Listado de clientes.
//Si no viene cliente que sea 0 y por ese 0 filtramos la consulta
$cliente = isset($_REQUEST['cliente']) ? $_REQUEST['cliente'] : 0;

/*Esta parte sobra, no entra en este caso nunca
if(is_null($keyword)){
    $sql="select * from pruebas_presupuestos ORDER BY fecha";
}*/

$sqlBase = "SELECT pruebas_presupuestos.id_ppto, pruebas_presupuestos.fecha, pruebas_coches.modelo as coche, pruebas_clientes.nombre as cliente, pruebas_presupuestos.total, pruebas_presupuestos.transporte, pruebas_presupuestos.canarias, pruebas_presupuestos.subtotal, pruebas_presupuestos.iva FROM pruebas_presupuestos INNER JOIN pruebas_clientes ON pruebas_presupuestos.id_cliente = pruebas_clientes.id_cliente INNER JOIN pruebas_coches ON pruebas_presupuestos.id_coche = pruebas_coches.id_coche "

if($cliente!=0){
    /*$sql="SELECT * FROM pruebas_presupuestos WHERE id_cliente = '$cliente' ORDER BY fecha";*/
    $sql=$sqlBase . "WHERE pruebas_presupuestos.id_cliente = '$cliente' ORDER BY fecha";
}
else{
	if (is_null($keyword)){
		/*$sql = "SELECT * FROM pruebas_presupuestos";	*/
		$sql = $sqlBase;
	}
	else{
		/*$sql = "SELECT * FROM pruebas_presupuestos WHERE (id_ppto LIKE '$keyword' or fecha LIKE '$keyword' or id_coche LIKE '$keyword' or id_cliente LIKE '$keyword' or total LIKE '$keyword') ORDER BY fecha";	*/
		$sql = $sqlBase . "WHERE (pruebas_presupuestos.id_ppto LIKE '$keyword' or pruebas_presupuestos.fecha LIKE '$keyword' or pruebas_presupuestos.id_coche LIKE '$keyword' or pruebas_presupuestos.id_cliente LIKE '$keyword' or pruebas_presupuestos.total LIKE '$keyword') ORDER BY fecha";	
	}   
}

//ejecutamos
$result = mysqli_query($link, $sql);

//JSON
$output= array();
while($fila = mysqli_fetch_assoc($result)){
    //$output[]= $fila; Con esta instrucción bastaría pero los registros con tildes los pone a null
    $output[]=array_map('utf8_encode', $fila);

}

    //Falta el close connection mysqli_close(mysqli_connect($host, $user, $password, $database)) or die("Error en la DCX");

echo $sql;
echo '{"Presupuestos":'.json_encode($output).'}';






