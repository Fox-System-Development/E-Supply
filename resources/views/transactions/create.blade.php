<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Transação</title>
    </head>
<body>
    <h1>Adicionar Nova Transação</h1>

    <form action="{{ route('transactions.store') }}" method="POST">
        @csrf

        <div>
            <label for="description">Descrição:</label><br>
            <input type="text" id="description" name="description" required>
        </div>
        <br>
        <div>
            <label for="amount">Valor (R$):</label><br>
            <input type="number" id="amount" name="amount" step="0.01" required>
        </div>
        <br>
        <div>
            <label for="type">Tipo:</label><br>
            <select name="type" id="type" required>
                <option value="receita">Receita</option>
                <option value="despesa">Despesa</option>
            </select>
        </div>
        <br>
        <div>
            <label for="date">Data:</label><br>
            <input type="date" id="date" name="date" required>
        </div>
        <br>
        <button type="submit">Salvar Transação</button>
    </form>
</body>
</html>