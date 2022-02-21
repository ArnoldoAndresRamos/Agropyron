<?php
include('../PHP/swc.php');

$arena      = $_POST['arena']/100;
$arcilla    = $_POST['arcilla']/100;
$m_organica = $_POST['m_organica'];


$j=soil_water_characteristics($arena,$arcilla,$m_organica);
echo json_encode($j);
//echo json_encode("arena:".$arena.","."arcilla".$arcilla);

/*
$suelo=soil_water_characteristics($arena,$arcilla,$m_organica);

$age = array("Peter"=>35, "Ben"=>37, "Joe"=>43);
echo json_encode($age);
//echo json_encode('{"capacided de campo:"'.$suelo["cc"].',punto de marchitez permanente:'.$suelo["pmp"].',c:'.$suelo["sat"].',d:'.$suelo["aguaDisp"].',e:'.$suelo["ksat"].',f:'.$suelo["densidad"]."}");
*/
?>
