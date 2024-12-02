<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Veículos</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Registros de Veículos</h1>
        <div class="d-flex justify-content-end mb-3">
            <a href="adicionar.php" class="btn btn-success">Adicionar Novo Registro</a>
        </div>

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
            echo "<table class='table table-striped'>
                    <thead class='table-dark'>
                        <tr>
                            <th>Veículo</th>
                            <th>Placa</th>
                            <th>Motorista</th>
                            <th>Destino</th>
                            <th>Data de Saída</th>
                            <th>Hora de Saída</th>
                            <th>Data de Chegada</th>
                            <th>Hora de Chegada</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>";
            while ($row = $result->fetch_assoc()) {
                $dataChegada = $row['data_chegada'];
                $horaChegada = $row['hora_chegada'];
                
                // Exibir status ou botão dependendo da chegada
                $status = (!empty($dataChegada) && !empty($horaChegada)) 
                    ? "<span class='badge bg-success'>Concluído</span>" 
                    : "<a href='atualizar.php?id={$row['id']}' class='btn btn-info btn-sm'>Finalizar Viagem</a>";

                echo "<tr>
                        <td>{$row['veiculo']}</td>
                        <td>{$row['placa']}</td>
                        <td>{$row['motorista']}</td>
                        <td>{$row['destino']}</td>
                        <td>{$row['data_saida']}</td>
                        <td>{$row['hora_saida']}</td>
                        <td>" . ($dataChegada ?: 'N/A') . "</td>
                        <td>" . ($horaChegada ?: 'N/A') . "</td>
                        <td>{$status}</td>
                      </tr>";
            }
            echo "</tbody></table>";
        } else {
            echo "<p class='text-center'>Nenhum registro encontrado.</p>";
        }

        $conn->close();
        ?>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
