<?php
include('swc.php');

$arena      = $_POST['arena']/100;
$arcilla    = $_POST['arcilla']/100;
$m_organica = $_POST['m_organica'];
$j=swc();

$humedad_1500kPa = humedad_1500kPa($arena , $arcilla , $m_organica);
$humedad_33kPa   = humedad_33kPa($arena , $arcilla , $m_organica);
$humedadSaturada_0kPa=humedadSaturada_0kPa($arena , $arcilla , $m_organica);

echo json_encode(" h 1500:".$humedad_1500kPa." h 33  :".$humedad_33kPa)." h 0 :".$humedadSaturada_0kPa;
//echo json_encode("sdkjfkljdf".$arena);
?>
