<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Viagem</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Cadastrar Nova Viagem</h1>
        <form action="salvar.php" method="POST" class="mt-4">
            <div class="mb-3">
                <label for="veiculo" class="form-label">Veículo</label>
                <input type="text" class="form-control" id="veiculo" name="veiculo" required>
            </div>
            <div class="mb-3">
                <label for="placa" class="form-label">Placa</label>
                <input type="text" class="form-control" id="placa" name="placa" required>
            </div>
            <div class="mb-3">
                <label for="motorista" class="form-label">Motorista</label>
                <input type="text" class="form-control" id="motorista" name="motorista" required>
            </div>
            <div class="mb-3">
                <label for="destino" class="form-label">Destino</label>
                <input type="text" class="form-control" id="destino" name="destino" required>
            </div>
            <div class="mb-3">
                <label for="data_saida" class="form-label">Data de Saída</label>
                <input type="date" class="form-control" id="data_saida" name="data_saida" required>
            </div>
            <div class="mb-3">
                <label for="hora_saida" class="form-label">Hora de Saída</label>
                <input type="time" class="form-control" id="hora_saida" name="hora_saida" required>
            </div>
            <button type="submit" class="btn btn-success w-100">Cadastrar Viagem</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
