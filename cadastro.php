<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];

    if(!empty($nome)){
        //informação do json
        $data = json_encode(['nome' => $nome]);
        //url da API
        $url = 'http://localhost/api-frutas/api/post.php';

        //biblioteca cURL
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: aplication/json']);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if($http_code == 201) {
            echo "Fruta cadastrada com sucesso";
        } else {
            echo "Erro ao cadastrar fruta" . $response;
        }
    }
}
?>

<!DOCTYPE hmtl>

<head>
    <title>Cadastro de fruta</title>
</head>

<body>
    <h1>Cadastro de frutas</h1>
    <form method="POST" action="">
        <label for="nome">Nome da fruta:</label>
        <input type="text" id="nome" name="nome" required>

        <button type="submit">Cadastrar fruta</button>
    </form>
</body>

</html>