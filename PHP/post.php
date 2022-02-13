<?php
include('swc.php');

$arena      = $_POST['arena']/100;
$arcilla    = $_POST['arcilla']/100;
$m_organica = $_POST['m_organica'];




//echo json_encode(" h 1500:".$humedad_1500kPa.","." h 33  :".$humedad_33kPa.","." h sat 33:".$h_sat_33kPa.", h sat 0:".$h_sat_0kPa.", d Ajus:".$densidadNormal);
$CC       = humedad_33kPaAjustadaDensidad($S , $C , $OM , $DF);
$PMP      = humedad_1500kPa( $S , $C , $OM );
$SAT      = humedadSaturada_0kPaAjustadaDensidad($S , $C , $OM , $DF );
$aguaDisp = aguaDisponible($S , $C , $OM , $DF );
$Ksat     = conductividadHidraulicaSaturada( $S , $C , $OM , $DF , $RW );
$densidad = densidadAjustada_gcm3( $S , $C , $OM , $DF );  

if ($CE!=0){
    $aguaDisponible = aguaDisponibleAjustada_CE($S , $C , $OM , $DF , $CE);
}
//$arr = array('a' => $CC , 'b' => $PMP , 'c' => $SAT , 'd' => $aguaDisp, 'e' => $Ksat,'f'=> $densidad );
//echo json_encode($arr);
echo json_encode('a:'.$CC.',b:'.$PMP.',c:'.$SAT.',d:'.$aguaDisp.',e:'.$Ksat.',f:'.$densidad );
?>
