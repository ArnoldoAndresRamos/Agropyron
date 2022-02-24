<?php
function numDia($fecha){
	
	$dia =  $fecha[0].$fecha[1];
	$mes =  $fecha[3].$fecha[4];
	$anio = $fecha[6].$fecha[7].$fecha[8].$fecha[9];
	$dias_mes = [31,28,31,30,31,30,31,31,30,31,30,31];
	$i=0;
	$n=1;
	$num_dia=$dia;

	while($mes>$n)
	{
		$num_dia = $num_dia + $dias_mes[$i];
		$i = $i+1;
		$n = $n+1; 
		
	}

	if($anio % 4 ==0 and $mes>2) 
	{
		$num_dia = $num_dia + 1;
	}

	return $num_dia;
	
};
$fecha = "20-01-2000";
//echo numDia(20-01-2000)."<br>";


function temperatura_media($Tmax , $Tmin){
    return ($Tmax+$Tmin)/2;
}

function curva_presion_de_vapor( $Tmax , $Tmin ){
    $Tmedia = temperatura_media($Tmax,$Tmin);
    $a = 4098 *( 0.6108 *( exp((17.27*$Tmedia)/($Tmedia+237.3)) ) ) ;
    $b = pow(($Tmedia+237.3),2);
    return  $a/$b; 
}
echo curva_presion_de_vapor(25,20);

function presion_atmosferica( $altitud ){
    return 101.3 * pow( (293-(0.0065*$altitud))/293 , 5,26);
}

function constante_pscicrometrica($altitud){
    return 0.000665 * presion_atmosferica($altitud);
}

function deficit_de_Presión_de_vapor($Tmax , $Tmin , $HRmax ,$HRmin){
    $e0_Tmax=0.6108*exp((17.27*$Tmax)/($Tmax+237.3)); // KPa
	$e0_Tmin=0.6108*exp((17.27*$Tmin)/($Tmin+237.3)); // KPa
    $es= ($e0_Tmax + $e0_Tmin)/2; //KPa
    $ea = ((($e0_Tmin * $HRmax)/100)+(($e0_Tmax * $HRmin)/100))/2; //KPa
    return $es-$ea;
}

function inverso_distancia_tierra_sol($numero_dia){
    return 1 + 0.033 * cos((2 * 3.14159265358979323846 / 365)*$numero_dia);
}

// δ declinación solar en Radianes (rad)
function declinacion_solar($numero_dia){
    return 0.409 * sin(((2 * 3.14159265358979323846 / 365)*$Dia_Juliano) - 1.39 );
}

// ωs ángulo solar de puesta de Sol en Radianes (rad)
function angulo_solar_de_puesta_de_sol($latitud , $numero_dia){
    $declinacion_solar = declinacion_solar($numero_dia); 
    return acos(-tan($latitud * 3.14159265358979323846 /180 )* tan($declinacion_solar)); 

}
function radiacion_solar($latitud , $numero_dia){

    $inverso_distancia_tierra_sol = inverso_distancia_tierra_sol($numero_dia);
    $declinacion_solar = declinacion_solar($numero_dia);
    $angulo_solar_de_puesta_de_sol = angulo_solar_de_puesta_de_sol($latitud , $numero_dia);
    
    $se = sin($Latitud*3.14159/180 ) * sin($declinacion_solar); // seno(latitud)*seno(δ) 
	$co = cos($Latitud*3.14159/180 ) * cos($declinacion_solar); //cos(latitud)*cos(δ)
	$Ra = (24*60/3.14159265358979323846)*0.082*$dr*($ws* $se + $co*sin($ws)); //en MJm-2día-1
}



function ETo($Tmax, $Tmin, $HRmax,  $HRmin, $Latitud, $Altitud, $Dia_Juliano, $u2, $n ){
	
	//constante de Boltzmann
	$cons_StefanBoltzmann = 0.000000004903; // (MJK^4/m^2)/día^1
	
	
	// Temperatura media Tmedia °C
 
	$Tmedia = ($Tmax+$Tmin)/2;



    $Tmax=25;
    $Tmin=20;
    
	$a=exp((17.27*$Tmedia)/($Tmedia+237.3));
	$b=0.6108*$a;
	$c=4098*$b;
	$d=pow(($Tmedia+237.3),2); //pow() para elevear al cuadrado
	$r=$c/$d;
    
	//echo "Pendiente de la curva de preción de vapor ".$r."<br>".
    



	//    P  Presión atmosférica  en KPa

 


	$w=(293-(0.0065*$Altitud))/293;
	$w1=pow($w,5.26);
	$P=101.3*$w1;
	//echo "Presion Atmosférica ".$P."<br>";


	//    γ Constante pscicrométrica en kPa°C-1
	$y = 0.000665*$P;  // $P es Presión Atmosférica
    
	//echo "Constante psicrometrica ".$y."<br>";

	$u2_1 = 1+0.34*$u2;//   (1+0,34u2)
	//echo "(1+0,34u2) ".$u2_1."<br>";

	$zr = $r/($r+$y*$u2_1); //  Δ/[Δ+γ(1+0,34u2)]
	//echo "Δ/[Δ+γ(1+0,34u2)] ".$zr."<br>";

	$zy = $y/($r+$y*($u2_1)); //  γ/[Δ+γ(1+0,34u2)]
	//echo "γ/[Δ+γ(1+0,34u2)] ".$zy."<br>";

	$Tmedia_u2 = (900/($Tmedia + 273))*$u2; //[ 900 / (Tmedia + 273) ] u2
	

	// Calculo del déficit de Presión de vapor 
	$e0_Tmax=0.6108*exp((17.27*$Tmax)/($Tmax+237.3)); // KPa
	$e0_Tmin=0.6108*exp((17.27*$Tmin)/($Tmin+237.3)); // KPa

	//Presión de saturación de vapor es = [(e°(Tmax) + e°(Tmin)]/2
	$es= ($e0_Tmax + $e0_Tmin)/2; //KPa
	
	// Presión real de vapor (ea) derivada de datos de humedad relativa
	$ea = ((($e0_Tmin * $HRmax)/100)+(($e0_Tmax * $HRmin)/100))/2; //KPa
	
	/*  Déficit de presión de vapor (es-ea) calculada con HRmin y HRmax  */ 
	$es_ea = $es - $ea; // KPa
	


	/*  Calculo de Radiación
	Parametros
	-Latitud
	-Dia juliano
	-n 
	*/
	$Latitud = $Latitud;
	$Dia_Juliano = $Dia_Juliano;
	$n = $n; 

	//dr inverso de la dist rel Tierra - Sol
	$dr= 1 + 0.033 * cos((2 * 3.14159265358979323846 / 365)*$Dia_Juliano);
	
	// δ declinación solar en Radianes (rad)
	$ds= 0.409 * sin(((2 * 3.14159265358979323846 / 365)*$Dia_Juliano) - 1.39 ); 

	// ωs ángulo solar de puesta de Sol en Radianes (rad)
	$ws= acos(-tan($Latitud * 3.14159265358979323846 /180 )* tan($ds)); 
	$se = sin($Latitud*3.14159/180 ) * sin($ds); // seno(latitud)*seno(δ) 
	$co = cos($Latitud*3.14159/180 ) * cos($ds); //cos(latitud)*cos(δ)
	$Ra = (24*60/3.14159265358979323846)*0.082*$dr*($ws* $se + $co*sin($ws)); //en MJm-2día-1
	
	
	// Duración máxima de la insolación (N)
	$N=(24/3.14159265358979323846)*$ws; 
	
	//duración relativa de la insolación
	$n_N = $n/$N; 
		
	// Rs (R solar o de onda corta) en MJ m-2 día-1
	$Rs = (0.25+(0.5*$n_N))* $Ra; 
	
	//Radiación solar en un día despejado Rso (R solar o de onda corta, c. desp) en MJ m-2 día-1
	$Rso =  (0.75+2*($Altitud)/100000)*$Ra; 
	
	//  Rs/Rso Radiación relativa de onda corta
	$Rs_Rso = $Rs/$Rso; 
	
	// Rns Radiación neta de onda corta MJ m-2 día-1
	$Rns = (1-0.23 )*$Rs; 
	
	
	/*   Calculo de la Radiación neta de onda larga (Rnl)  */

	// σTmaxK4
	$TmaxK4   = $cons_StefanBoltzmann*pow(($Tmax+273.16),4);
	$TminK4   = $cons_StefanBoltzmann*pow(($Tmin+273.16),4);
	$promedio = ($TmaxK4+$TminK4)/2;
	
	$Rs_Rso2  = (0.34-(0.14*sqrt($ea)));
	$Rs_Rso3  = ((1.35 *($Rs_Rso))-0.35);
	
	$Rnl= $promedio *  $Rs_Rso2 *  $Rs_Rso3; // Rnl (Radiación neta de onda larga) MJ m^2 día^1
	

	/*      Calculo de radiacion neta (Rn=Rns-Rnl)    */
	$Rn = $Rns-$Rnl; // MJ m^2 día^1
	

	/*  Rn - G  */
	$G = 0;
	$Rn_G =  $Rn-$G; // MJ m^2 día^1
	

	/*    0.408(Rn - G)    */
	$Rn_G_mm = 0.408*($Rn_G); // mm
	

	/*    Resultado de calculo de Evapotranspiracion de referencia  en mm/día  */
	$ETo = ($zr * $Rn_G_mm)+($zy * $Tmedia_u2 *$es_ea);
	return $ETo; //"mm/día"."<br>"

}
$Tmax = 25;
$Tmin = 20;
$HRmax= 60;
$HRmin= 20;
$Latitud= -71.2;
$Altitud=170;
$Dia_Juliano = 33;
$u2=2.3;
$n = 9;
echo ETo($Tmax, $Tmin, $HRmax,  $HRmin, $Latitud, $Altitud, $Dia_Juliano, $u2, $n );

?>