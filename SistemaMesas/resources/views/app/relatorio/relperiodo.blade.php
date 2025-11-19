<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Relatório de Vendas por Período</title>
    <style>
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            color: #333;
            font-size: 12px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
        }
        .header h1 {
            margin: 0;
            font-size: 22px;
        }
        .header p {
            margin: 5px 0;
            font-size: 14px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        .total {
            text-align: right;
            font-size: 16px;
            font-weight: bold;
            margin-top: 20px;
        }
        .footer {
            text-align: center;
            font-size: 10px;
            color: #777;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Relatório de Vendas por Período</h1>
        <p>Período de {{ \Carbon\Carbon::parse($validate['data_inicio'])->format('d/m/Y') }} a {{ \Carbon\Carbon::parse($validate['data_fim'])->format('d/m/Y') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>Pedido ID</th>
                <th>Mesa</th>
                <th>Data da Venda</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vendas as $venda)
                <tr>
                    <td>{{ $venda->pedido_id }}</td>
                    <td>{{ $venda->mesa_id }}</td>
                    <td>{{ \Carbon\Carbon::parse($venda->data_venda)->format('d/m/Y H:i') }}</td>
                    <td>R$ {{ number_format($venda->total, 2, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="total">
        Total de Vendas no Período: R$ {{ number_format($totalVendas, 2, ',', '.') }}
    </div>

    <div class="footer">
        <p>Relatório gerado em {{ date('d/m/Y H:i') }}</p>
    </div>
</body>
</html>