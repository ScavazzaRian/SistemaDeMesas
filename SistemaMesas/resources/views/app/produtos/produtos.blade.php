<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Produtos</title>
</head>

<body>
    @component('layouts._components.sidebar_menu')
    @endcomponent
    <!-- Content -->
<div class="content p-4">
    <!-- Header com Título e Barra de Pesquisa -->
    <div class="mb-4">
        <h1>Gerenciar Produtos</h1>
        <p class="text-muted">Gerencie seus produtos do sistema</p>
        
        <!-- Barra de Pesquisa e Botão Cadastrar -->
        <div class="mt-3 d-flex gap-2">
            <input type="text" class="form-control" placeholder="Pesquisar por nome de produtos...">
            <button class="btn btn-success" style="white-space: nowrap;">
                <a href="{{ route('produtos.create') }}" class="btn btn-success" style="white-space: nowrap;">
                    <i class="fas fa-plus"></i> Cadastrar
                </a>
            </button>
        </div>
    </div>

    <!-- Tabela de Produtos -->
    @if(count($produtos) > 0)
        <div class="table-responsive">
            <table class="table table-hover">
                <thead style="background-color: #2c3e50; color: white;">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Preço Compra</th>
                        <th>Preço Venda</th>
                        <th>Quantidade</th>
                        <th>Margem Total</th>
                        <th width="150">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produtos as $produto)
                        <tr style="background-color: {{ $loop->even ? '#f8f9fa' : 'white' }};">
                            <td><strong>{{ $produto->id }}</strong></td>
                            <td><strong>{{ $produto->nome }}</strong></td>
                            <td>R$ {{ number_format($produto->preco_compra, 2, ',', '.') }}</td>
                            <td>R$ {{ number_format($produto->preco_venda, 2, ',', '.') }}</td>
                            <td>{{ $produto->quantidade }}</td>
                            <td><strong style="color: #27ae60;">R$ {{ number_format($produto->preco_venda * $produto->quantidade, 2, ',', '.') }}</strong></td>
                            <td>
                                <div class="d-flex gap-2">
                                    <!-- Botão Editar -->
                                    <button class="btn btn-sm" style="background-color: #f39c12; color: white;" title="Editar">
                                            <a href="{{route('produtos.update', $produto)}}" style="color: inherit; text-decoration: none;">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                    </button>
                                    
                                    <!-- Botão Deletar -->
                                    <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST">
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
            Nenhum produto encontrado.
        </div>
    @endif
</div>
</body>

</html>
