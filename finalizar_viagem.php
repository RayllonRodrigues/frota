<?php
// Conexão com o banco de dados
$conn = new mysqli('localhost', 'root', '41418162218', 'controle_veiculos');

// Verifica se a conexão foi bem-sucedida
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$response = ['success' => false];

// Verifica se os dados foram enviados via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['registro_id'];
    $data_chegada = $_POST['data_chegada'];
    $hora_chegada = $_POST['hora_chegada'];

    // Atualiza os dados de chegada no banco de dados
    $sql = "UPDATE registros SET data_chegada = ?, hora_chegada = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssi', $data_chegada, $hora_chegada, $id);

    if ($stmt->execute()) {
        $response['success'] = true;
    }

    $stmt->close();
}

$conn->close();

// Retorna a resposta como JSON
echo json_encode($response);
?>
