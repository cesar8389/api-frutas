<?php
header('Content-Type: application/json');
include 'database.php';

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['id']) && isset($data['nome'])) {
    $id = $data['id'];
    $nome = $data['nome'];

    $sql = "UPDATE frutas SET nome='$nome' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(['message' => 'Fruta atualizada com sucesso!']);
    } else {
        echo json_encode(['message' => 'Erro ao atualizar fruta.']);
    }
} else {
    echo json_encode(['message' => 'Dados incompletos.']);
}

$conn->close();
?>