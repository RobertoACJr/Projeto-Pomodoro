<?php 
session_start();

$time_inicio = strtotime(date("Y-m-d H:i:s"));
$time_final = strtotime($_SESSION['end_time']);

$diferencaSegundos = $time_final - $time_inicio;

echo gmdate("i:s", $diferencaSegundos);
?>