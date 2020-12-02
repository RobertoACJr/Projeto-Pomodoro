<?php 
session_start();


if(isset($_SESSION['end_time']) && strtotime($_SESSION['end_time']) >= strtotime(date("Y-m-d H:i:s"))){

    $time_inicio = strtotime(date("Y-m-d H:i:s"));
    $time_final = strtotime($_SESSION['end_time']);

    $diferencaSegundos = $time_final - $time_inicio;

    if ($diferencaSegundos >= 3600) {
        echo gmdate("H:i:s", $diferencaSegundos);
    } else {
        echo gmdate("i:s", $diferencaSegundos);
    }

} else {

    echo ('finalizar');

}
?>