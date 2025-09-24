<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Minhas Transações</title>
</head>
<body>
    <h1>Minhas Transações</h1>

    <a href="{{ route('transactions.create') }}">Adicionar Nova Transação</a>

    <br><br>

    <table border="1">
        <thead>
            <tr>
                <th>Data</th>
                <th>Descrição</th>
                <th>Valor</th>
                <th>Tipo</th>
                <th >Ações</th> 

            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->date }}</td>
                    <td>{{ $transaction->description }}</td>
                    <td>R$ {{ number_format($transaction->amount, 2, ',', '.') }}</td>
                    <td >{{ $transaction->type }}</td>
                    <td>
                        <a href="{{ route('transactions.edit', $transaction) }}">Editar</a>

                        <form action="{{ route('transactions.destroy', $transaction) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Tem a certeza?');">Apagar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>