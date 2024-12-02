<?php
// Conexão com o banco de dados
$conn = new mysqli('localhost', 'root', '41418162218', 'controle_veiculos');

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Consulta os registros
$sql = "SELECT * FROM registros";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h1>Registros de Veículos</h1>";
    echo "<table border='1'>
            <tr>
                <th>Veículo</th>
                <th>Placa</th>
                <th>Motorista</th>
                <th>Destino</th>
                <th>Data de Saída</th>
                <th>Hora de Saída</th>
                <th>Data de Chegada</th>
                <th>Hora de Chegada</th>
            </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['veiculo']}</td>
                <td>{$row['placa']}</td>
                <td>{$row['motorista']}</td>
                <td>{$row['destino']}</td>
                <td>{$row['data_saida']}</td>
                <td>{$row['hora_saida']}</td>
                <td>{$row['data_chegada']}</td>
                <td>{$row['hora_chegada']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "Nenhum registro encontrado.";
}

$conn->close();
?>
