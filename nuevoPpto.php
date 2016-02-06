<?php

header('Access-Control-Allow-Origin: *');
include 'inc/conexion.php';

extract($_REQUEST); 

$canarias_newPpto = isset($_REQUEST['canarias_newPpto']) ? 1 : 0;

/* PASOS:
1. INSERTAR TODOS LOS ARTÍCULOS DEL PRESUPUESTO EN DETALLE_PRESUPUESTO
2. INSERTAR EL PRESUPUESTO EN PRESUPUESTOS
3. Ambos pasos hay que hacerlos mediante una transacción en la bbdd*/

/*usar array_filter para eliminar eltos vacíos en arrays dinámicos*/
$descripcion=array_filter($_REQUEST[descripcion]);
$ref=array_filter($_REQUEST[ref]);
$check=array_filter($_REQUEST[check]);
$uds=array_filter($_REQUEST[uds]);
$precio=array_filter($_REQUEST[precio]);
$cambio=array_filter($_REQUEST[cambio]);
$pvp=array_filter($_REQUEST[pvp]);
$dto=array_filter($_REQUEST[dto]);
//$total=array_filter($_REQUEST[total]);

/*Si el número de eltos de todos los arrays no es el mismo no están bien informados los artículos en el formulario*/

$size = count($descripcion);
if ($size != count($ref) ||  $size != count($check) || $size != count($uds) || $size != count($precio) || $size != count($cambio) || $size != count($pvp) || $size != count($dto)){ echo ('No iguales');}
else { 
	// 1. Inserción en Detalle_Presupuestos
	$query="INSERT INTO pruebas_detalle_presupuestos (id_ppto, descripcion, referencia, uds, precio, cambio, pvp, dto) VALUES ";

	for ($i = 0; $i <= count($descripcion)-1; $i++) {
    	//$query = $query.$descripcion[$i]."un mojón";
    	$query = $query."((SELECT max(id_ppto) +1 FROM pruebas_presupuestos), '".$descripcion[$i]."', '".$ref[$i]."', '".$uds[$i]."', '".$precio[$i]."', '".$cambio[$i]."', '".$pvp[$i]."', '".$dto[$i]."'), ";
	}

	//$query quitarle la última ,
	$query = substr($query, 0, -2);
	
	/*INSERTAR EN LA TABLA DE PRESUPUESTOS*/
	$query2= "INSERT INTO pruebas_presupuestos (fecha, id_coche, id_cliente, total, transporte, canarias, subtotal, iva) VALUES ('$fecha_newPpto', (SELECT id_coche from pruebas_coches WHERE (id_cliente = '$id_cliente' AND ppal=1)), '$id_cliente', 0, '$transporte_newPpto', '$canarias_newPpto', 0, '$iva_newPpto')";

	mysqli_query($link, $query);
	mysqli_query($link, $query2);
	echo $query;
	echo 1;
}

/*Para que no de error si deja fila d eartículos vacías entre medias
	for ($i = 0; $i <= count($descripcion)-1; $i++) {
    	//$query = $query.$descripcion[$i]."un mojón";
    	$query = $query."((SELECT max(id_ppto) +1 FROM pruebas_presupuestos), ".$descripcion[$i] = ($_REQUEST['descripcion['.$i.']']) ? $descripcion[$i] : ''.", ".$ref[$i] = ($_REQUEST['ref['.$i.']']) ? $ref[$i] : ''.", ".$uds[$i] = ($_REQUEST['uds['.$i.']']) ? $uds[$i] : ''.", ".$precio[$i] = ($_REQUEST['precio['.$i.']']) ? $precio[$i] : ''.", ".$cambio[$i] = ($_REQUEST['cambio['.$i.']']) ? $cambio[$i] : ''.", ".$pvp[$i] = ($_REQUEST['pvp['.$i.']']) ? $pvp[$i] : ''.", ".$dto[$i] = ($_REQUEST['dto['.$i.']']) ? $dto[$i] : ''."), ";
	}*/
		//$descripcion[$i] = ($_REQUEST['descripcion['.$i.']']) ? $descripcion[$i] : '';











