<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Relatórios</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">

    <!-- Font Awesome (Ícones) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    @component('layouts._components.sidebar_menu')
    @endcomponent
    
    <!-- Content -->
    <div class="content p-4">
        <!-- Header com Título e Descrição -->
        <div class="mb-4">
            <h1>Relatórios</h1>
            <p class="text-muted">Gere e exporte relatórios do sistema</p>
        </div>

        <!-- Tabela de Relatórios -->
        <div class="table-responsive">
            <table class="table table-hover">
                <thead style="background-color: #2c3e50; color: white;">
                    <tr>
                        <th style="width: 20%;">Nome</th>
                        <th style="width: 40%;">Descrição</th>
                        <th style="width: 40%; text-align: right;">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Item 1: Vendas Diárias -->
                    <tr style="background-color: white;">
                        <td style="vertical-align: middle;"><strong>Vendas Diárias</strong></td>
                        <td style="vertical-align: middle;">Relatório consolidado de todas as vendas realizadas hoje.</td>
                        <td style="vertical-align: middle;">
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('exportar.vendas.dodia.pdf') }}" target="_blank"
                                    class="btn btn-sm btn-danger" 
                                    title="Gerar PDF">
                                    <i class="fas fa-file-pdf"></i> Gerar PDF
                                </a>
                            </div>
                        </td>
                    </tr>

                    <!-- Item 2: Vendas Mensais -->
                    <tr style="background-color: #f8f9fa;">
                        <td style="vertical-align: middle;"><strong>Vendas Mensais</strong></td>
                        <td style="vertical-align: middle;">Relatório consolidado de todas as vendas do mês atual.</td>
                        <td style="vertical-align: middle;">
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('exportar.vendas.mes.pdf') }}" target="_blank"
                                    class="btn btn-sm btn-danger" 
                                    title="Gerar PDF">
                                    <i class="fas fa-file-pdf"></i> Gerar PDF
                                </a>
                            </div>
                        </td>
                    </tr>

                    <!-- Item 3: Listagem de Produtos -->
                    <tr style="background-color: white;">
                        <td style="vertical-align: middle;"><strong>Listagem de Produtos</strong></td>
                        <td style="vertical-align: middle;">Lista completa de todos os produtos cadastrados, incluindo estoque.</td>
                        <td style="vertical-align: middle;">
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('exportar.produtos.pdf') }}" target="_blank"
                                    class="btn btn-sm btn-danger" 
                                    title="Gerar PDF">
                                    <i class="fas fa-file-pdf"></i> Gerar PDF
                                </a>
                            </div>
                        </td>
                    </tr>

                    <!-- Item 4: Por período -->
                    <tr style="background-color: #f8f9fa;">
                        <td style="vertical-align: middle;"><strong>Relatório por Período</strong></td>
                        <td style="vertical-align: middle;">Relatório consolidado de todas as vendas do período inserido.</td>
                        <td style="vertical-align: middle;">
                            <form action="{{ route('exportar.periodo.pdf') }}" method="POST" target="_blank"
                                class="d-flex gap-2 align-items-center justify-content-end">
                                @csrf
                                <div class="d-flex align-items-center gap-2">
                                    <label for="data_inicio" class="mb-0 text-nowrap small">Data Início</label>
                                    <input type="date" 
                                           class="form-control form-control-sm" 
                                           id="data_inicio"
                                           name="data_inicio" 
                                           style="width: 150px;" 
                                           required>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <label for="data_fim" class="mb-0 text-nowrap small">Data Fim</label>
                                    <input type="date" 
                                           class="form-control form-control-sm" 
                                           id="data_fim"
                                           name="data_fim" 
                                           style="width: 150px;" 
                                           required>
                                </div>
                                <button type="submit" 
                                        class="btn btn-sm btn-danger" 
                                        title="Gerar PDF">
                                    <i class="fas fa-file-pdf"></i> Gerar PDF
                                </button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
</body>

</html>