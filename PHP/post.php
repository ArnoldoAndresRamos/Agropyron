<?php
$temperatura_max      = $_POST['temperatura_max'];
$temperatura_min      = $_POST['temperatura_min'];
$humeded_relativa_max = $_POST['humeded_relativa_max'];
$humeded_relativa_min = $_POST['humeded_relativa_min'];
$velocidadViento      = $_POST['velocidadViento'];
$duracionDia          = $_POST['duracionDia'];

$fecha       = $_POST['fecha'];
$latitud     = $_POST['latitud'];
$duracionDia = $_POST['duracionDia'];

//echo json_encode('usuario: '.$usuario.'<br> pass: '.$pass);

$usuario = $_POST['usuario'];
$pass    = $_POST['pass'];

if($temperatura_max ==='' || $temperatura_min ===''){
    echo json_encode('error');
}else{
    echo json_encode('usuario: '.$temperatura_max.'<br> pass: '.$temperatura_min);
    echo json_encode('t_max'.$temperatura_max.'t_min'.$temperatura_min.'hr_max'.$humeded_relativa_max.'hr_max'.$humeded_relativa_min);
}
?>
