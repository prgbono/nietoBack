<?php
//require_once ('../dompdf/dompdf_config.inc.php');
header('Access-Control-Allow-Origin: *');
//PARA PRODUCCIÓN
include ('../nietoBack/inc/conexion.php');

if($_POST)
{
    foreach ($_POST as $clave=>$valor)
    {
		echo "El valor de $clave es: $valor"."\n";
        echo "<br>";
	}
}

if(isset($_POST["CSVdoc"]))
{
	$file = $_FILES['CSVdoc']['tmp_name'];
	$handle = fopen($file, "r");
	$c = 0;
	while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
	{
		$part_number = $filesop[0];
		$title = $filesop[1];
		$sp_title = $filesop[2];
		$gbp = $filesop[3];

		echo 'esto es una linea';

		//$sql = mysql_query("INSERT INTO csv (name, email) VALUES ('$name','$email')");
		$sql= "DELETE FROM bbdd";
		mysqli_query($link, $sql);
		$sql= "INSERT INTO bbdd (part_number, title, sp_title, gbp) VALUES ('$partNumber', '$title', '$titulo', '$gbp')";
		mysqli_query($link, $sql);
	}

	/*if($sql){
		echo "OK";
	}else{
		echo "KO";
	}*/
}
/*else{
	echo "KO";
}*/

?>