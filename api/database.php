<?php
$host = 'localhost';
$dbname = 'frutas_db';
$username = 'root';
$password = 'root';

$conn = new mysqli($host, $username, $password, $dbname);

if($conn->connect_error) {
    die("Erro de conexao: ". $conn->connect_error);
}

?>