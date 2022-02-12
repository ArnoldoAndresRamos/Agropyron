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

function densidadAjustada_gcm3($S , $C , $OM , $DF=1){
    return densidadNormal_gcm3($S , $C , $OM)*$DF;
}
echo densidadAjustada_gcm3(0.8,0.04,2.08,$DF=1.2);

function swc(){
 return "hola";
}

?>