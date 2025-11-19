<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resumo Diário</title>
    <style>
        body {
            font-family: 'Helvetica', sans-serif;
            color: #333;
            font-size: 12px;
        }
        .clearfix::after {
            content: ""; clear: both; display: table;
        }
        .header {
            text-align: center;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
            margin-bottom: 30px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .header p {
            margin: 5px 0 0;
            font-size: 14px;
            color: #555;
        }
        .summary-container {
            display: block;
            width: 100%;
            margin-bottom: 30px;
        }
        .summary-box {
            border: 1px solid #ddd;
            padding: 15px;
            text-align: center;
            width: 30%; /* Aproximadamente 1/3 da página */
            float: left;
            margin: 1%;
            box-sizing: border-box;
        }
        .summary-box .label {
            font-size: 14px;
            color: #666;
            margin-bottom: 10px;
            text-transform: uppercase;
        }
        .summary-box .value {
            font-size: 22px;
            font-weight: bold;
            color: #2c3e50;
        }
        .section-title {
            font-size: 18px;
            font-weight: bold;
            border-bottom: 1px solid #eee;
            padding-bottom: 5px;
            margin-bottom: 15px;
            clear: both; /* Limpa o float dos boxes */
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
        .text-right {
            text-align: right;
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
        <h1>Resumo Diário</h1>
        {{-- A data será passada pelo Controller --}}
        <p>Referente ao dia: {{ $dataRelatorio ?? date('d/m/Y') }}</p>
    </div>

    <div class="summary-container clearfix">
        <div class="summary-box" style="width: 100%; float: none; margin: 0 auto 20px;">
            <div class="label">Total de Vendas do Dia</div>
            <div class="value">R$ {{ number_format($totalVendas ?? 0, 2, ',', '.') }}</div>
        </div>
    </div>

    <h2 class="section-title">Detalhes das Vendas</h2>

    @if(isset($vendas) && count($vendas) > 0)
        <table>
            <thead>
                <tr>
                    <th>Pedido ID</th>
                    <th>Mesa ID</th>
                    <th class="text-right">Status</th>
                    <th class="text-right">Valor Total</th>
                    <th class="text-right">Data da Venda</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vendas as $venda)
                    <tr>
                        <td>{{ $venda->pedido_id }}</td>
                        <td>{{ $venda->mesa_id }}</td>
                        <td class="text-right">{{ $venda->status }}</td>
                        <td class="text-right">R$ {{ number_format($venda->total, 2, ',', '.') }}</td>
                        <td class="text-right">R$ {{ $venda->data_venda }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Nenhuma venda registrada para o dia de hoje.</p>
    @endif


    <div class="footer">
        Relatório gerado em {{ date('d/m/Y H:i:s') }}
    </div>
</body>
</html>