<?php
include('swc.php');

$arena      = $_POST['arena']/100;
$arcilla    = $_POST['arcilla']/100;
$m_organica = $_POST['m_organica'];


$suelo=soil_water_characteristics($arena,$arcilla,$m_organica);

$age = array("Peter"=>35, "Ben"=>37, "Joe"=>43);
echo json_encode($age);
?>
