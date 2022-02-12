<?php
include('swc.php');

$arena      = $_POST['arena'];
$arcilla    = $_POST['arcilla'];
$m_organica = $_POST['m_organica'];
$j=swc();

echo json_encode('arena :'.$arena."<br>".'arcilla:'.$arcilla."<br>".'M.O:'.$m_organica." func".$j);
//echo json_encode("sdkjfkljdf".$arena);
?>
