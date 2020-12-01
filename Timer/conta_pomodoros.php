<?php
session_start();

if(isset($_POST["count"])){
$_SESSION['contador'] = $_SESSION['contador'] + 1;
}

echo($_SESSION['contador']);
?>
