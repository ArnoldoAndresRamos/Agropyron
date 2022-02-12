<?php

function humedad_1500kPa($S , $C , $OM){
    $u1500t = -0.024 * $S + 0.487 * $C + 0.006 * $OM + 0.005*($S * $OM) - 0.013*($C * $OM) + 0.068*($S * $C) + 0.031;
    $u1500 = $u1500t + (0.14 * $u1500t - 0.02);
    return $u1500;
}
function humedad_33kPa($S , $C , $OM){
  $u33t = -0.251*$S + 0.195*$C + 0.011*$OM + 0.006*($S * $OM) - 0.027*($C * $OM) + 0.452*($S * $C) + 0.299;
  $u33  = $u33t + (1.283*($u33t)**2 - 0.374*($u33t) - 0.015);
  return $u33; 
}
function humedadSaturada_33kPa($S , $C , $OM){
  $uSat_33t = 0.278 * $S + 0.034*$C + 0.022 * $OM - 0.018*($S * $OM) - 0.027*($C * $OM) - 0.584*($S * $C) + 0.078;
  $uSat_33  = $uSat_33t + (0.636 * $uSat_33t - 0.107);
  return $uSat_33;
}
function humedadSaturada_0kPa($S , $C , $OM){
  return humedadSaturada_33kPa($S , $C , $OM) + humedad_33kPa($S , $C , $OM) -  0.097* $S + 0.043;
}
function densidadNormal_gcm3($S , $C , $OM){
    return (1 - humedadSaturada_0kPa($S , $C , $OM) ) *2.65;
}



/* EFECTO DE LA DENSIDAD */
function densidadAjustada_gcm3($S , $C , $OM , $DF=1){
    return densidadNormal_gcm3($S , $C , $OM)*$DF;
}
function humedadSaturada_0kPaAjustadaDensidad($S , $C , $OM , $DF){
    return 1 - densidadAjustada_gcm3($S , $C , $OM ,$DF )/ 2.65;
}
function humedad_33kPaAjustadaDensidad($S , $C , $OM , $DF){
    return humedad_33kPa($S , $C , $OM) -0.2 * ( humedadSaturada_0kPa($S , $C , $OM) - humedadSaturada_0kPaAjustadaDensidad($S , $C , $OM , $DF) );
}

function humedadSaturada_33kPaAjustadaDensidad($S , $C , $OM , $DF){
    return humedadSaturada_0kPaAjustadaDensidad($S , $C , $OM , $DF) - humedad_33kPaAjustadaDensidad($S , $C , $OM , $DF);
}



/* EFECTO DE LA GRAVA */
function fraccionDeVolumenDeGrava($S,$C,$OM,$DF,$RW){
    $alfa = densidadAjustada_gcm3($S,$C,$OM,$DF) / 2.65;
    return (1-$RW) / (1-$RW * (1-1.5*$alfa));
}



/* HUMEDAD -CONDUCTIVIDAD */
function Lambda($S , $C , $OM , $DF){
    $a = log( humedad_33kPaAjustadaDensidad($S , $C , $OM , $DF) );
    $b = log( humedad_1500kPa($S , $C , $OM ));
    $c = log( 1500 ) - log( 33 );
    return ($a-$b)/$c;
}

function conductividadHidraulicaSaturada($S , $C , $OM , $DF , $RW){
  return 1930 * humedadSaturada_33kPaAjustadaDensidad($S , $C , $OM , $DF)**(3-Lambda($S , $C , $OM ,$DF)) * fraccionDeVolumenDeGrava($S,$C,$OM,$DF,$RW);
}




/* HUMEDAD - TENSION */
function tensionEntradaDeAire($S,$C,$OM,$DF){
  $uS_33 = humedadSaturada_33kPaAjustadaDensidad($S , $C , $OM , $DF);
  $Yet   = -21.67*$S - 27.932*$C - 81.975* $uS_33 + 71.121*($S * $uS_33) + 8.294*($C * $uS_33) + 14.05*($S * $C) + 27.161;
  $Ye    = $Yet + (0.02*$Yet**2 - 0.113* $Yet - 0.70);
  return $Ye;
}

echo tensionEntradaDeAire(0.85 , 0.04 , 2.0 , 1);



function swc(){
 return "hola";
}

?>