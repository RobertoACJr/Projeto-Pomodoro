<?php 
session_start();

if(isset($_POST['duracao'])){
    $_SESSION["time"] = $_POST['duracao'];
    $_SESSION["start_time"] = date("Y-m-d H:i:s");
    $end_time = date('Y-m-d H:i:s', strtotime('+'.$_SESSION["time"].'minutes', strtotime($_SESSION["start_time"])));
    $_SESSION["end_time"] = $end_time;
} 

if(strtotime($_SESSION['end_time']) >= strtotime(date("Y-m-d H:i:s"))){
    echo ($_SESSION['time']);
} else {
    echo (-1);
}
?>