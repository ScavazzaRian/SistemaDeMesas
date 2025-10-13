<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marmitas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    @component('layouts._components.sidebar_menu')
    @endcomponent

    <div class="content p-4">
        <!-- Header -->
        <div class="mb-4">
            <h1>Gerenciar Marmitas</h1>
            <p class="text-muted">Gerencie as marmitas cadastradas</p>

            <!-- Pesquisa e botão cadastrar -->
            <div class="mt-3 d-flex gap-2">
                <input type="text" class="form-control" placeholder="Pesquisar por nome do cliente...">
                <a href="{{ route('marmitas.create') }}" class="btn btn-success" style="white-space: nowrap;">
                    <i class="fas fa-plus"></i> Cadastrar
                </a>
            </div>
        </div>

        <!-- Tabela de Marmitas -->
        @if(count($marmitas) > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead style="background-color: #2c3e50; color: white;">
                        <tr>
                            <th>ID</th>
                            <th>Cliente</th>
                            <th>Telefone</th>
                            <th>Endereço</th>
                            <th>Tipo</th>
                            <th>Preço</th>
                            <th>Status</th>
                            <th width="150">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($marmitas as $marmita)
                            <tr style="background-color: {{ $loop->even ? '#f8f9fa' : 'white' }};">
                                <td><strong>{{ $marmita->id }}</strong></td>
                                <td>{{ $marmita->nome_cliente }}</td>
                                <td>{{ $marmita->telefone }}</td>
                                <td>{{ $marmita->endereco }}</td>
                                <td>{{ ucfirst($marmita->tipo) }}</td>
                                <td>R$ {{ number_format($marmita->preco, 2, ',', '.') }}</td>
                                <td>
                                    @if($marmita->status === 'preparando')
                                        <span class="badge bg-warning text-dark">Preparando</span>
                                    @elseif($marmita->status === 'entregue')
                                        <span class="badge bg-success">Entregue</span>
                                    @elseif($marmita->status === 'cancelado')
                                        <span class="badge bg-danger">Cancelado</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <!-- Botão Editar -->
                                        <a href="{{ route('marmitas.update', $marmita->id) }}" class="btn btn-sm" style="background-color: #f39c12; color: white;" title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <!-- Botão Deletar -->
                                        <form action="{{ route('marmitas.destroy', $marmita->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm" style="background-color: #e74c3c; color: white;" title="Deletar">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert alert-info text-center">
                Nenhuma marmita encontrada.
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
