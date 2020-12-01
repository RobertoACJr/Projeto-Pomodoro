<?php
session_start();

if(isset($_POST["count"])){
$_SESSION['contador'] = $_SESSION['contador'] + 1;
}

if(strtotime($_SESSION['end_time']) >= strtotime($_SESSION['data_limite'])){
    $_SESSION['contador'] = 1;
    $_SESSION['data_limite'] = date('Y-m-d',  strtotime("tomorrow"));
}

echo($_SESSION['contador']);
?>
