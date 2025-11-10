<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mesas</title>
</head>
<body>
    @component('layouts._components.sidebar_menu')
    @endcomponent

    <!-- Content -->
    <div class="content p-4">
        <!-- Header com Título e Barra de Pesquisa -->
        <div class="mb-4">
            <h1>Gerenciar Mesas</h1>
            <p class="text-muted">Gerencie as mesas do sistema</p>
            
            <!-- Barra de Pesquisa e Botão Cadastrar -->
            <div class="mt-3 d-flex gap-2">
                <input type="text" class="form-control" placeholder="Pesquisar por número de mesa...">
                <button class="btn btn-success" style="white-space: nowrap;">
                    <a href=" {{ route('mesas.show.create')}} " class="btn btn-success" style="white-space: nowrap;">
                        <i class="fas fa-plus"></i> Cadastrar
                    </a>
                </button>
            </div>
        </div>

        <!-- Tabela de Mesas -->
        @if(isset($mesas) && count($mesas) > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead style="background-color: #2c3e50; color: white;">
                        <tr>
                            <th>ID</th>
                            <th>Número Mesa</th>
                            <th>Capacidade</th>
                            <th width="200">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mesas as $mesa)
                            <tr style="background-color: {{ $loop->even ? '#f8f9fa' : 'white' }};">
                                <td><strong>{{ $mesa->id }}</strong></td>
                                <td><strong>{{ $mesa->numero }}</strong></td>
                                <td>{{ $mesa->quantidade }} pessoas</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <!-- Botão Adicionar Pedido -->
                                        <button class="btn btn-sm" style="background-color: #3498db; color: white;" title="Adicionar Pedido">
                                            <a href="#" style="color: inherit; text-decoration: none;">
                                                <i class="fas fa-shopping-cart"></i>
                                            </a>
                                        </button>
                                        
                                        <!-- Botão Editar -->
                                        <button class="btn btn-sm" style="background-color: #f39c12; color: white;" title="Editar">
                                            <a href="{{route('mesas.show.update', $mesa)}}" style="color: inherit; text-decoration: none;">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </button>
                                        
                                        <!-- Botão Deletar -->
                                        <form action="{{ route('mesas.destroy', $mesa->id)}}" method="POST">
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
                Nenhuma mesa encontrada.
            </div>
        @endif
    </div>
</body>
</html>