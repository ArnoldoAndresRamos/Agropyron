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
echo $temperatura_max ,"sdfdsf", $temperatura_min ,$humeded_relativa_max , $humeded_relativa_min;
$usuario = $_POST['usuario'];
$pass    = $_POST['pass'];

if($usuario ==='' || $pass ===''){
    echo json_encode('error');
}else{
    echo json_encode('usuario: '.$usuario.'<br> pass: '.$pass);
}
?>
