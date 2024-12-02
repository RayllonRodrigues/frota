<?php
// Conexão com o banco de dados
$conn = new mysqli('localhost', 'root', '41418162218', 'controle_veiculos');

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Verifica se os dados foram enviados via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $veiculo = $_POST['veiculo'];
    $placa = $_POST['placa'];
    $motorista = $_POST['motorista'];
    $destino = $_POST['destino'];
    $data_saida = $_POST['data_saida'];
    $hora_saida = $_POST['hora_saida'];

    // Insere o registro no banco de dados
    $sql = "INSERT INTO registros (veiculo, placa, motorista, destino, data_saida, hora_saida)
            VALUES ('$veiculo', '$placa', '$motorista', '$destino', '$data_saida', '$hora_saida')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Viagem cadastrada com sucesso!');
                window.location.href = 'index.php';
              </script>";
    } else {
        echo "Erro ao cadastrar viagem: " . $conn->error;
    }
}

$conn->close();
?>
