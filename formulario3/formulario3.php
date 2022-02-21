<?php
include('../PHP/swc.php');
$arena      = $_POST['are']/100;
$arcilla    = $_POST['arc']/100;
$m_organica = $_POST['m_o'];

$n = soil_water_characteristics($arena,$arcilla,$m_organica);

$datos = json_encode($n);

echo $datos;

// para modificar de beben tener los permisos
$myfile = fopen("output.json", "w"); 
$bytes = fwrite($myfile, $datos); 
fclose($myfile); 
?>