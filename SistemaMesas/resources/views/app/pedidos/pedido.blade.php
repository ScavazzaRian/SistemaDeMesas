<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    @component('layouts._components.sidebar_menu')
    @endcomponent

    <!-- Header com Título e Barra de Pesquisa -->
<div class="content p-4">
    <!-- Header com Título e Barra de Pesquisa -->
    <div class="mb-4">
        <h1>Gerenciar Pedidos</h1>
        <p class="text-muted">Gerencie seus pedidos em aberto</p>
        
        <!-- Barra de Pesquisa e Botão Cadastrar -->
        <div class="mt-3 d-flex gap-2">
            <input type="text" class="form-control" placeholder="Pesquisar por id dos pedidos...">
            <button class="btn btn-success" style="white-space: nowrap;">
                <a href="{{ route('produtos.create') }}" class="btn btn-success" style="white-space: nowrap;">
                    <i class="fas fa-plus"></i> Cadastrar
                </a>
            </button>
        </div>
    </div>
</div>

</body>
</html>