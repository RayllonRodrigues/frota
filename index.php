<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Veículos</title>
    <!-- Importa o CSS do Bootstrap para estilização e responsividade -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Container principal com margem superior -->
    <div class="container mt-5">
        <!-- Título centralizado -->
        <h1 class="text-center">Registros de Veículos</h1>
        <center>Controle de entrada e saída de veículos - Guarita IFTO</center>

        <!-- Botão para adicionar novo registro alinhado à direita -->
        <div class="d-flex justify-content-end mb-3">
            <a href="adicionar.php" class="btn btn-success">Adicionar Novo Registro</a>
        </div>

        <?php
        // Conexão com o banco de dados
        $conn = new mysqli('localhost', 'root', '41418162218', 'controle_veiculos');

        // Verifica se a conexão falhou
        if ($conn->connect_error) {
            die("Falha na conexão: " . $conn->connect_error);
        }

        // Consulta os registros na tabela "registros"
        $sql = "SELECT * FROM registros";
        $result = $conn->query($sql);

        // Verifica se há registros retornados
        if ($result->num_rows > 0) {
            // Cria uma tabela estilizada do Bootstrap
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
            // Itera sobre os registros retornados
            while ($row = $result->fetch_assoc()) {
                $dataChegada = $row['data_chegada'];
                $horaChegada = $row['hora_chegada'];
                
                // Define o status com base nos dados de chegada
                $status = (!empty($dataChegada) && !empty($horaChegada)) 
                    ? "<span class='badge bg-success'>Concluído</span>" 
                    : "<a href='atualizar.php?id={$row['id']}' class='btn btn-info btn-sm'>Finalizar Viagem</a>";

                // Preenche a tabela com os dados do banco
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
            // Mensagem exibida se não houver registros
            echo "<p class='text-center'>Nenhum registro encontrado.</p>";
        }

        // Fecha a conexão com o banco de dados
        $conn->close();
        ?>
    </div>

    <!-- Importa o JavaScript do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

<!-- Rodapé fixado ao final da página -->
<footer class="text-center py-3">
    <div class="container">
        <!-- Texto com direitos autorais -->
        <p class="mb-1">&copy; 2024 Controle de Veículos. Todos os direitos reservados.</p>
        <!-- Link para crédito do desenvolvedor -->
        <small>Desenvolvido por <a href="#" class="text-decoration-none text-dark fw-bold">Rayllon Rodrigues</a></small>
    </div>
</footer>
</html>