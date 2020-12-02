<?php
session_start();

//se não existir $_POST é uma verificação, por isso não o contador
//não será incrementado
if(isset($_POST["count"])){
    $_SESSION['contador'] = $_SESSION['contador'] + 1;
}

//caso o tempo final seja maior que o tempo limite, significa que
//já passou da meia noite, e o contador irá para 1, pois esse pomodoro
//será considerado do dia posterior
if(isset($_SESSION['end_time']) && strtotime($_SESSION['end_time']) >= strtotime($_SESSION['data_limite'])){
    $_SESSION['contador'] = 1;
    $_SESSION['data_limite'] = date('Y-m-d',  strtotime("tomorrow"));
}

echo($_SESSION['contador']);
?>
