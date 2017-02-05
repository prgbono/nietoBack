<?php
header('Access-Control-Allow-Origin: *');
include 'inc/conexion.php';
  
function combo($valores, $seleccionado='', $name='combo') {
  $combo = "<select name=\"$name\" id=\"$name\" size=\"1\"";
  $combo .= ">\n";

  foreach ($valores as $ids => $texto) {
    $combo .= "<option value=\"$ids\"";
    if ($seleccionado == $ids) $combo .= ' selected';
    $combo .= ">$texto</option>\n";
  }
   $combo .= "</select>\n";
  echo $combo;
}