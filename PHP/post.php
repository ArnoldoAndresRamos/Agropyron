<?php
include('swc.php');

$arena      = $_POST['arena'];
$arcilla    = $_POST['arcilla'];
$m_organica = $_POST['m_organica'];


$humedad_1500kPa        = humedad_1500kPa($arena , $arcilla , $m_organica);
$humedad_33kPa          = humedad_33kPa($arena , $arcilla , $m_organica);
$humedadSaturada_33kPa  = humedadSaturada_33kPa($arena , $arcilla , $m_organica);

echo json_encode(" h 1500:".$humedad_1500kPa.","." h 33  :".$humedad_33kPa);
?>
