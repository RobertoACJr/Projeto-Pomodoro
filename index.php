<?php 
    session_start(); 
    $_SESSION['contador'] = 0; 
    header("location: Views/timer_pomodoro.php"); 
?>