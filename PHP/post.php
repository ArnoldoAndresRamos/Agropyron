<?php
include('swc.php');

$arena      = $_POST['arena']/100;
$arcilla    = $_POST['arcilla']/100;
$m_organica = $_POST['m_organica'];

$res = soil_water_characteristics( $arena  , $arcilla , $m_organica);
//echo $res;
//echo soil_water_characteristics( $S=0.2  , $C=0.2 , $OM=2.5 , $DF=1, $RW =0, $CE=0);

echo json_encode($res);
//echo json_encode(" h 1500:".$humedad_1500kPa.","." h 33  :".$humedad_33kPa.","." h sat 33:".$h_sat_33kPa.", h sat 0:".$h_sat_0kPa.", d Ajus:".$densidadNormal);

?>
