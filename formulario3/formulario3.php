<?php
include('../PHP/swc.php');
$n = soil_water_characteristics(0.8,0.04,2.08);
$s = $_POST['s'];
$m = $_POST['m'];
//echo "string"+$s+$m+34;
$datos = json_encode($n);
//echo json_encode($n);
$output = file_put_contents("output.json","w+",$datos);
?>