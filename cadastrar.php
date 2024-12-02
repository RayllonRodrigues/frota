<?php
// Conexão com o banco de dados
$conn = new mysqli('localhost', 'root', '', 'controle_veiculos');

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Recebe os dados do formulário
$veiculo = $_POST['veiculo'];
$placa = $_POST['placa'];
$motorista = $_POST['motorista'];
$destino = $_POST['destino'];
$data_saida = $_POST['data_saida'];
$hora_saida = $_POST['hora_saida'];
$data_chegada = $_POST['data_chegada'];
$hora_chegada = $_POST['hora_chegada'];

// Insere os dados na tabela
$sql = "INSERT INTO registros (veiculo, placa, motorista, destino, data_saida, hora_saida, data_chegada, hora_chegada)
        VALUES ('$veiculo', '$placa', '$motorista', '$destino', '$data_saida', '$hora_saida', '$data_chegada', '$hora_chegada')";

if ($conn->query($sql) === TRUE) {
    echo "Registro cadastrado com sucesso!";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
