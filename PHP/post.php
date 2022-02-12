<?php
$arena      = $_POST['arena'];
$arcilla    = $_POST['arcilla'];
$m_organica = $_POST['m_organica'];


$latitud     = $_POST['latitud'];
$longitud    = $_POST['longitud'];



if($temperatura_max ==='' || $temperatura_min ===''){
    echo json_encode('error');
}else{
    //cho json_encode('usuario: '.$temperatura_max.'<br> pass: '.$temperatura_min);
    echo json_encode('arena :'.$arena."<br>".'arcilla:'.$arcilla."<br>".'M.O:'.$m_organica;
}
?>
