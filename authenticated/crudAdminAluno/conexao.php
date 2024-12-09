<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jobs";

$conexao = new mysqli($servername, $username, $password, $dbname);

if ($conexao->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

?>