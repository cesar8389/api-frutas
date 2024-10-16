<?php
header('Content-Type: application/json');
include 'database.php';

$sql = "SELECT * FROM frutas";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $frutas = [];
    while ($row = $result->fetch_assoc()) {
        $frutas[] = $row;
    }
    echo json_encode($frutas);
} else {
    echo json_encode(['message' => 'Nenhuma fruta encontrada']);
}

$conn->close();
?>