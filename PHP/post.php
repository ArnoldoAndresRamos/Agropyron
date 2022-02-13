<?php
include('swc.php');

$arena      = $_POST['arena']/100;
$arcilla    = $_POST['arcilla']/100;
$m_organica = $_POST['m_organica'];




//echo json_encode(" h 1500:".$humedad_1500kPa.","." h 33  :".$humedad_33kPa.","." h sat 33:".$h_sat_33kPa.", h sat 0:".$h_sat_0kPa.", d Ajus:".$densidadNormal);
/*
$CC       = humedad_33kPaAjustadaDensidad($arean , $C , $OM , $DF);
$PMP      = humedad_1500kPa( $S , $C , $OM );
$SAT      = humedadSaturada_0kPaAjustadaDensidad($S , $C , $OM , $DF );
$aguaDisp = aguaDisponible($S , $C , $OM , $DF );
$Ksat     = conductividadHidraulicaSaturada( $S , $C , $OM , $DF , $RW );
$densidad = densidadAjustada_gcm3( $S , $C , $OM , $DF );  

if ($CE!=0){
    $aguaDisponible = aguaDisponibleAjustada_CE($S , $C , $OM , $DF , $CE);
}
*/
$suelo=soil_water_characteristics($arena,$arcilla,$m_organica);
//echo json_encode('a:'.$CC.',b:'.$PMP.',c:'.$SAT.',d:'.$aguaDisp.',e:'.$Ksat.',f:'.$densidad );
$age = array("Peter"=>35, "Ben"=>37, "Joe"=>43);
echo json_encode($age);
//echo json_encode('{"capacided de campo:"'.$suelo["cc"].',punto de marchitez permanente:'.$suelo["pmp"].',c:'.$suelo["sat"].',d:'.$suelo["aguaDisp"].',e:'.$suelo["ksat"].',f:'.$suelo["densidad"]."}");
?>
