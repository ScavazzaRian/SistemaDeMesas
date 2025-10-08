<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Produto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    @component('layouts._components.sidebar_menu')
    @endcomponent
    
    <!-- Content -->
    <div class="content p-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <!-- Header -->
                    <div class="mb-4">
                        <h1>Editar Produto</h1>
                        <p class="text-muted">Atualize os dados do produto</p>
                    </div>

                    <!-- Card do Formulário -->
                    <div class="card shadow-sm">
                        <div class="card-body p-4">
                            <form action="{{route('produto.update', $produto)}}" method="POST">
                                @csrf
                                @method('PUT')
                                
                                <!-- Nome -->
                                <div class="mb-3">
                                    <label for="nome" class="form-label">Nome do Produto <span class="text-danger">*</span></label>
                                    <input type="text" 
                                           name="nome" 
                                           id="nome" 
                                           class="form-control @error('nome') is-invalid @enderror" 
                                           placeholder="{{ $produto->nome }}"
                                           >
                                    @error('nome')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Categoria -->
                                <div class="mb-3">
                                    <label for="categoria" class="form-label">Categoria <span class="text-danger">*</span></label>
                                    <select name="categoria" 
                                            id="categoria" 
                                            class="form-select @error('categoria') is-invalid @enderror">
                                        <option value="">Selecione uma categoria</option>
                                        <option value="bebidas" {{ $produto->categoria == 'bebidas' ? 'selected' : '' }}>Bebidas</option>
                                        <option value="pratos" {{ $produto->categoria == 'pratos' ? 'selected' : '' }}>Pratos</option>
                                        <option value="self-service" {{ $produto->categoria == 'self-service' ? 'selected' : '' }}>Self-Service</option>
                                        <option value="doces" {{ $produto->categoria == 'doces' ? 'selected' : '' }}>Doces</option>
                                        <option value="diversos" {{ $produto->categoria == 'diversos' ? 'selected' : '' }}>Diversos</option>
                                    </select>
                                    @error('categoria')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Preço Compra e Preço Venda -->
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="preco_compra" class="form-label">Preço de Compra <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text">R$</span>
                                            <input type="number" 
                                                   name="preco_compra" 
                                                   id="preco_compra" 
                                                   class="form-control @error('preco_compra') is-invalid @enderror" 
                                                   placeholder="{{ $produto->preco_compra }}"
                                                   step="0.01"
                                                   >
                                            @error('preco_compra')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="preco_venda" class="form-label">Preço de Venda <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text">R$</span>
                                            <input type="number" 
                                                   name="preco_venda" 
                                                   id="preco_venda" 
                                                   class="form-control @error('preco_venda') is-invalid @enderror" 
                                                   placeholder="{{ $produto->preco_venda }}"
                                                   step="0.01"
                                                   >
                                            @error('preco_venda')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Quantidade -->
                                <div class="mb-4">
                                    <label for="quantidade" class="form-label">Quantidade em Estoque <span class="text-danger">*</span></label>
                                    <input type="number" 
                                           name="quantidade" 
                                           id="quantidade" 
                                           class="form-control @error('quantidade') is-invalid @enderror" 
                                           placeholder="{{ $produto->quantidade }}"
                                           >
                                    @error('quantidade')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Botões -->
                                <div class="d-flex gap-2">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-save"></i> Atualizar Produto
                                    </button>
                                    <a href="{{route('produtos')}}" class="btn btn-secondary">
                                        <i class="fas fa-arrow-left"></i> Voltar
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>