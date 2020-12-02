<?php 
session_start();

//caso exista a var $_POST, significa que é do tipo 'a' ou 'b'
//caso não haja, é do tipo 'c', então as $_SESSIONs não devem ser setadas
//pois é apenas umas verificação
if(isset($_POST['duracao'])){
    $_SESSION["time"] = $_POST['duracao'];
    $_SESSION['tipo'] = $_POST['tipo'];
    $_SESSION["start_time"] = date("Y-m-d H:i:s");
    $end_time = date('Y-m-d H:i:s', strtotime('+'.$_SESSION["time"].'minutes', strtotime($_SESSION["start_time"])));
    $_SESSION["end_time"] = $end_time;
} 

//caso o tempo final seja menor que o atual, o timer não será executado
if(strtotime($_SESSION['end_time']) >= strtotime(date("Y-m-d H:i:s"))){
    echo ($_SESSION['tipo']);
} else {
    echo ('d');
}
?>