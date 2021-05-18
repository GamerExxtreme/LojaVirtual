<?php
$host = "localhost";
$user = "root";
$pw = "";
$database = "12tsi10_dados";

$con = mysqli_connect($host, $user, $pw) or die("Erro na ligação");
$db = mysqli_select_db($con, $database) or die("Erro na seleção da base de dados");
?>