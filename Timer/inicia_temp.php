<?php 
session_start();

$_SESSION["time"] = 25;
$_SESSION["start_time"] = date("Y-m-d H:i:s");
$end_time = date('Y-m-d H:i:s', strtotime('+'.$_SESSION["time"].'minutes', strtotime($_SESSION["start_time"])));
$_SESSION["end_time"] = $end_time;

?>