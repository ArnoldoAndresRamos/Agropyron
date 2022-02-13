<?php
include('swc.php');

$arena      = $_POST['arena']/100;
$arcilla    = $_POST['arcilla']/100;
$m_organica = $_POST['m_organica'];

$res = soil_water_characteristics( $arena  , $arcilla , $m_organica);
echo $res;

/*
$humedad_1500kPa        = humedad_1500kPa($arena , $arcilla , $m_organica);
$humedad_33kPa          = humedad_33kPa($arena , $arcilla , $m_organica);

$h_sat_33kPa            = humedadSaturada_33kPa($arena , $arcilla , $m_organica);
$h_sat_0kPa             = humedadSaturada_0kPa($arena, $arcilla , $m_organica);
$densidadNormal         = densidadNormal_gcm3($arena , $arcilla , $m_organica);

echo json_encode(" h 1500:".$humedad_1500kPa.","." h 33  :".$humedad_33kPa.","." h sat 33:".$h_sat_33kPa.", h sat 0:".$h_sat_0kPa.", d Ajus:".$densidadNormal);
*/
?>
