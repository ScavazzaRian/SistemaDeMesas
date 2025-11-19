<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Produtos</title>
    <style>
        body {
            font-family: 'Helvetica', sans-serif;
            font-size: 12px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            margin: 0;
        }
        .header p {
            margin: 0;
            font-size: 14px;
            color: #555;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Relatório de Produtos</h1>
        <p>Lista de todos os produtos cadastrados no sistema.</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Categoria</th>
                <th>Preço Venda</th>
                <th>Estoque</th>
                <th>Valor Total em Estoque</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produtos as $produto)
                <tr>
                    <td>{{ $produto->id }}</td>
                    <td>{{ $produto->nome }}</td>
                    <td>{{ ucfirst($produto->categoria) }}</td>
                    <td>R$ {{ number_format($produto->preco_venda, 2, ',', '.') }}</td>
                    <td>{{ $produto->quantidade }}</td>
                    <td>{{ "R$ " . number_format($produto->quantidade * $produto->preco_venda, 2, ',', '.')}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>