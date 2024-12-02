<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Veículos</title>
</head>
<body>
    <h1>Cadastro de Controle de Veículos</h1>
    <form action="cadastrar.php" method="POST">
        <label for="veiculo">Veículo:</label>
        <input type="text" id="veiculo" name="veiculo" required><br><br>

        <label for="placa">Placa:</label>
        <input type="text" id="placa" name="placa" required><br><br>

        <label for="motorista">Motorista:</label>
        <input type="text" id="motorista" name="motorista" required><br><br>

        <label for="destino">Destino:</label>
        <input type="text" id="destino" name="destino" required><br><br>

        <label for="data_saida">Data de Saída:</label>
        <input type="date" id="data_saida" name="data_saida" required><br><br>

        <label for="hora_saida">Hora de Saída:</label>
        <input type="time" id="hora_saida" name="hora_saida" required><br><br>

        <label for="data_chegada">Data de Chegada:</label>
        <input type="date" id="data_chegada" name="data_chegada" required><br><br>

        <label for="hora_chegada">Hora de Chegada:</label>
        <input type="time" id="hora_chegada" name="hora_chegada" required><br><br>

        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>
