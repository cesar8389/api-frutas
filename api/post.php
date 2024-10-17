<?php
include 'database.php';

$data = json_decode(file_get_contents("php://input"), true);

if(isset($data['nome']) && !empty($data['nome'])) {
    $nome = $data['nome'];

    $sql = "INSERT INTO frutas (nome) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $nome);

    if($stmt->execute()) {
        http_response_code(201);
        echo json_encode(['message' => 'Fruta cadastrada com sucesso!']);
    } else {
        http_response_code(500);
        echo json_encode(['message' => 'Erro ao cadastrar a fruta.']);
    }
} else {
    http_response_code(400);
    echo json_encode(['message' => 'Nome da fruta não foi enviado.']);
}

$conn->close();
?>