<?php 
    session_start(); 
    $_SESSION['contador'] = 0;  
    $_SESSION['data_limite'] = date('Y-m-d',  strtotime("tomorrow"));

    header("location: Views/timer_pomodoro.php"); 
?>