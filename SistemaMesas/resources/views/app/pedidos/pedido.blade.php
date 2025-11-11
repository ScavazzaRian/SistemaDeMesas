<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gerenciar Pedidos</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    
    @component('layouts._components.sidebar_menu')
    @endcomponent

    <!-- Header com Título e Barra de Pesquisa -->
    <div class="content p-4">
        <!-- Header com Título e Barra de Pesquisa -->
        <div class="mb-4">
            <h1><i class="bi bi-receipt"></i> Gerenciar Pedidos</h1>
            <p class="text-muted">Gerencie seus pedidos em aberto</p>
            
            <!-- Barra de Pesquisa e Botão Cadastrar -->
            <div class="mt-3 d-flex gap-2">
                <input type="text" class="form-control" placeholder="Pesquisar por id dos pedidos...">
                <a href="{{ route('pedido.show.create') }}" class="btn btn-success" style="white-space: nowrap;">
                    <i class="fas fa-plus"></i> Cadastrar pedido
                </a>
            </div>
        </div>

        <!-- Lista de Pedidos -->
        @if($pedidos->isNotEmpty())
            @foreach($pedidos as $pedido)
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-danger text-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">
                            <i class="bi bi-bag-"></i> Pedido #{{ $pedido->id }}
                        </h5>
                        <span>
                            {{ ucfirst($pedido->status) }}
                        </span>
                    </div>

                    <div class="card-body">
                        <h6 class="text-muted mb-3">
                            <i class="bi bi-list-ul"></i> Itens do Pedido
                        </h6>

                        @if ($pedido->produtosRelacao->isNotEmpty())
                            <div class="table-responsive">
                                <table class="table table-hover align-middle mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Produto</th>
                                            <th class="text-end">Preço Unit.</th>
                                            <th class="text-center">Quantidade</th>
                                            <th class="text-end">Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($pedido->produtosRelacao as $item)
                                            <tr>
                                                <td>
                                                    <strong>{{ $item->produto->nome }}</strong>
                                                </td>
                                                <td class="text-end text-muted">
                                                    R$ {{ number_format($item->preco_unitario_vendido, 2, ',', '.') }}
                                                </td>
                                                <td class="text-center">
                                                    <span class="badge bg-info">{{ $item->quantidade }}</span>
                                                </td>
                                                <td class="text-end">
                                                    <strong>R$ {{ number_format($item->subtotal, 2, ',', '.') }}</strong>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot class="table-light">
                                        <tr>
                                            <td colspan="3" class="text-end"><strong>Total do Pedido:</strong></td>
                                            <td class="text-end">
                                                <strong class="text-success fs-5">
                                                    R$ {{ number_format($pedido->total, 2, ',', '.') }}
                                                </strong>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        @else
                            <div class="alert alert-warning mb-0" role="alert">
                                <i class="bi bi-exclamation-triangle"></i> Nenhum item encontrado neste pedido.
                            </div>
                        @endif
                    </div>

                    <div class="card-footer bg-light">
                        <div class="d-flex justify-content-end gap-2">
                            <form action="{{route('pedidos.concluir',$pedido)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <button class="btn btn-sm btn-outline-success">
                                    <i class="bi bi-pencil"></i> Concluir
                                </button>
                            </form>
                            <form action="{{route('pedidos.destroy', $pedido->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">
                                    <i class="bi bi-trash"></i> Cancelar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="alert alert-info text-center" role="alert">
                <i class="bi bi-info-circle"></i> Nenhum pedido encontrado.
            </div>
        @endif
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>