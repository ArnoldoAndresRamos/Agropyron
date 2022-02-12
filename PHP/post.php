<?php
include('swc.php');

$arena      = $_POST['arena'];
$arcilla    = $_POST['arcilla'];
$m_organica = $_POST['m_organica'];
$j=swc();

$humedad_1500kPa = humedad_1500kPa($arena , $arcilla , $m_organica);
$humedad_33kPa   = humedad_33kPa($arena , $arcilla , $m_organica);

echo json_encode('arena :'.$arena."<br>".'arcilla:'.$arcilla."<br>".'M.O:'.$m_organica." func".$humedad_1500kPa." h_33:".$humedad_33kPa);
//echo json_encode("sdkjfkljdf".$arena);
?>
