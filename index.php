<?php
// URL da API que retorna as frutas
$url = 'http://localhost/api-frutas/api/get.php';

// Inicia a sessão cURL
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);

// Verifica se houve algum erro na requisição
if ($response === false) {
    echo 'Erro ao se comunicar com a API: ' . curl_error($ch);
    exit;
}

// Converte a resposta JSON para um array associativo em PHP
$frutas = json_decode($response, true);

// Verifica se a decodificação JSON foi bem-sucedida
if (json_last_error() !== JSON_ERROR_NONE) {
    echo 'Erro ao decodificar JSON: ' . json_last_error_msg();
    exit;
}

curl_close($ch);
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frutas Cadastradas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
            background-color: #f9f9f9;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            margin: 20px 0;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .center {
            text-align: center;
        }
    </style>
</head>
<body>

    <h1>Frutas Cadastradas</h1>

    <?php if (!empty($frutas)): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($frutas as $fruta): ?>
                    <tr>
                        <td><?= htmlspecialchars($fruta['id']) ?></td>
                        <td><?= htmlspecialchars($fruta['nome']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="center">Nenhuma fruta cadastrada.</p>
    <?php endif; ?>

</body>
</html>
