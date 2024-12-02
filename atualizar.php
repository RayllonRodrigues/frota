<?php
// Conexão com o banco de dados
$conn = new mysqli('localhost', 'root', '41418162218', 'controle_veiculos');

// Verifica se a conexão foi bem-sucedida
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Consulta os registros
$sql = "SELECT * FROM registros";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Veículos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
        <div class="container mt-5">
        <h1 class="text-center">Registros de Veículos</h1>
        <div class="d-flex justify-content-end mb-3">
            <a href="adicionar.php" class="btn btn-success">Adicionar Novo Registro</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Veículo</th>
                    <th>Placa</th>
                    <th>Motorista</th>
                    <th>Destino</th>
                    <th>Data de Saída</th>
                    <th>Hora de Saída</th>
                    <th>Data de Chegada</th>
                    <th>Hora de Chegada</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0) : ?>
                    <?php while($row = $result->fetch_assoc()) : ?>
                        <tr>
                            <td><?php echo $row['veiculo']; ?></td>
                            <td><?php echo $row['placa']; ?></td>
                            <td><?php echo $row['motorista']; ?></td>
                            <td><?php echo $row['destino']; ?></td>
                            <td><?php echo $row['data_saida']; ?></td>
                            <td><?php echo $row['hora_saida']; ?></td>
                            <td><?php echo $row['data_chegada'] ? $row['data_chegada'] : '---'; ?></td>
                            <td><?php echo $row['hora_chegada'] ? $row['hora_chegada'] : '---'; ?></td>
                            <td>
                                <?php if (empty($row['data_chegada']) && empty($row['hora_chegada'])) : ?>
                                    <button class="btn btn-primary btn-sm" onclick="openModal(<?php echo $row['id']; ?>)">Finalizar Viagem</button>
                                <?php else : ?>
                                    <span class="badge bg-success">Concluído</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else : ?>
                    <tr><td colspan="9">Nenhum registro encontrado.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="finalizarModal" tabindex="-1" aria-labelledby="finalizarModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="finalizarModalLabel">Finalizar Viagem</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formFinalizar">
                        <div class="mb-3">
                            <label for="data_chegada" class="form-label">Data de Chegada:</label>
                            <input type="date" class="form-control" id="data_chegada" name="data_chegada" required>
                        </div>
                        <div class="mb-3">
                            <label for="hora_chegada" class="form-label">Hora de Chegada:</label>
                            <input type="time" class="form-control" id="hora_chegada" name="hora_chegada" required>
                        </div>
                        <input type="hidden" id="registro_id" name="registro_id">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" id="btnFinalizar">Finalizar Viagem</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Função para abrir o modal
        function openModal(id) {
            // Preenche o campo oculto com o ID do registro
            document.getElementById('registro_id').value = id;

            // Abre o modal
            var myModal = new bootstrap.Modal(document.getElementById('finalizarModal'));
            myModal.show();
        }

        // Envia os dados via AJAX
        document.getElementById('btnFinalizar').addEventListener('click', function(e) {
            e.preventDefault();

            var form = document.getElementById('formFinalizar');
            var formData = new FormData(form);

            // Envia os dados para o PHP via AJAX
            fetch('finalizar_viagem.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Viagem finalizada com sucesso!');
                    location.reload(); // Recarrega a página para mostrar os dados atualizados
                } else {
                    alert('Erro ao finalizar viagem!');
                }
            })
            .catch(error => {
                alert('Erro na requisição!');
                console.error(error);
            });
        });
    </script>
</body>
</html>

<?php
$conn->close();
?>
