<?php
header('Content-Type: application/json');
include 'database.php';

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['id'])) {
    $id = $data['id'];

    $sql = "DELETE FROM frutas WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(['message' => 'Fruta removida com sucesso!']);
    } else {
        echo json_encode(['message' => 'Erro ao remover fruta.']);
    }
} else {
    echo json_encode(['message' => 'ID não fornecido.']);
}

$conn->close();
?>