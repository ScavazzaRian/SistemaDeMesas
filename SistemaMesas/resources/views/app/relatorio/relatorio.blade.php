<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Relatórios</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!-- Font Awesome (Ícones) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" xintegrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    @component('layouts._components.sidebar_menu')
    @endcomponent
    <!-- Content -->
    <div class="content p-4">
        <!-- Header com Título e Barra de Pesquisa -->
        <div class="mb-4">
            <h1>Relatórios</h1>
            <p class="text-muted">Gere e exporte relatórios do sistema</p>
        </div>

        <!-- Tabela de Relatórios -->
        <div class="table-responsive">
            <table class="table table-hover">
                <thead style="background-color: #2c3e50; color: white;">
                    <tr>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th width="150">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Item 1: Vendas Diárias -->
                    <tr style="background-color: white;">
                        <td><strong>Vendas Diárias</strong></td>
                        <td>Relatório consolidado de todas as vendas realizadas hoje.</td>
                        <td>
                            <div class="d-flex gap-2">
                                <!-- Botão PDF -->
                                <a href="{{route('exportar.vendas.dodia.pdf')}}" class="btn btn-sm btn-danger" style="color: white; text-decoration: none;" title="Gerar PDF">
                                    <i class="fas fa-file-pdf"></i> Gerar PDF
                                </a>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Item 2: Vendas Mensais -->
                    <tr style="background-color: #f8f9fa;">
                        <td><strong>Vendas Mensais</strong></td>
                        <td>Relatório consolidado de todas as vendas do mês atual.</td>
                        <td>
                            <div class="d-flex gap-2">
                                <!-- Botão PDF -->
                                <a href="#" class="btn btn-sm btn-danger" style="color: white; text-decoration: none;" title="Gerar PDF">
                                    <i class="fas fa-file-pdf"></i> Gerar PDF
                                </a>
                            </div>
                        </td>
                    </tr>

                    <!-- Item 3: Listagem de Produtos -->
                    <tr style="background-color: white;">
                        <td><strong>Listagem de Produtos</strong></td>
                        <td>Lista completa de todos os produtos cadastrados, incluindo estoque.</td>
                        <td>
                            <div class="d-flex gap-2">
                                <!-- Botão PDF -->
                                <a href="{{route('exportar.produtos.pdf')}}" class="btn btn-sm btn-danger" style="color: white; text-decoration: none;" title="Gerar PDF">
                                    <i class="fas fa-file-pdf"></i> Gerar PDF
                                </a>
                            </div>
                        </td>
                    </tr>

                    <!-- Item 4: Curva ABC -->
                    <tr style="background-color: #f8f9fa;">
                        <td><strong>Curva ABC de Produtos</strong></td>
                        <td>Análise de produtos por relevância de faturamento (Curva ABC).</td>
                        <td>
                            <div class="d-flex gap-2">
                                <!-- Botão PDF -->
                                <a href="#" class="btn btn-sm btn-danger" style="color: white; text-decoration: none;" title="Gerar PDF">
                                    <i class="fas fa-file-pdf"></i> Gerar PDF
                                </a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>