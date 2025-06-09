<?php

$host = 'localhost';
$user="root";
$banco="login0106";
$senha="";

$conn = new mysqli($host, $user, $senha, $banco);
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}




?>