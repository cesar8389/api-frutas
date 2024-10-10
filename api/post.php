<?php
header('Content-Type: aplication/json');
include 'database.php';

$data = json_decode(file_get_contents('php://input'), true);

if(isset($data['nome'])){
    $nome = $data['nome'];

    $sql = "INSERT INTO frutas (nome) VALUES ($nome)";

    if($conn->query($sql) === TRUE) {
        echo json_encode(['message' => 'Fruta adicionada com sucesso']);
    } else {
        echo json_encode(['message' => 'Erro ao adicionar fruta']);
    }
} else {
    echo json_encode(['message'=>'Nome da fruta não fornecido']);
}

$conn->close();
?>