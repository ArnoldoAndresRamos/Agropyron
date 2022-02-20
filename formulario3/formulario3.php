<?php
include('../PHP/swc.php');
$arena      = $_POST['are1'];
//$arcilla    = $_POST['arcilla']/100;
//$m_organica = $_POST['m_organica'];
$n = soil_water_characteristics(0.8,0.04,2.08);
//$m = soil_water_characteristics($arena,$arcilla,$m_organica);
$s = $_POST['s'];
$m = $_POST['m'];
//echo "string"+$s+$m+34;
$datos = json_encode($arena);
//echo $datos;
echo $m;
// para modificar de beben tener los permisos
$myfile = fopen("output.json", "w"); 
$bytes = fwrite($myfile, $datos); 
fclose($myfile); 
?>