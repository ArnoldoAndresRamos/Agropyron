<?php
include('../PHP/swc.php');
$arena      = $_POST['arena']/100;
$arcilla    = $_POST['arcilla']/100;
$m_organica = $_POST['m_organica'];
$n = soil_water_characteristics(0.8,0.04,2.08);
//$s = $_POST['s'];
//$m = $_POST['m'];
//echo "string"+$s+$m+34;
$datos = json_encode($n);
echo $datos;

// para modificar de beben tener los permisos
$myfile = fopen("output.json", "w"); 
$bytes = fwrite($myfile, $datos); 
fclose($myfile); 
?>