<?php
header('Access-Control-Allow-Origin: *');

//BBDD connect
include 'inc/conexion.php';


//Meter los clientes en $valores con listarClientes.php

  /*$valores      - matriz con todos los valores del deplegable (id y value),
  $seleccionado  - si hay algún item seleccionado
  $name          - name y id del objeto en el form
  $estilo        - class que le asignaremos al objeto
  $onchange      - secuencias javascript que genera el evento onchange de este objeto

  NOTA: Si se quiere una primera opción tipo [Elige una opción] basta con incluirlo en la primera posición de la matriz $valores */
  
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