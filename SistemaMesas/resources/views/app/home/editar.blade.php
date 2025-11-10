<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Mesa</title>
</head>
<body>
    @component('layouts._components.sidebar_menu')
    @endcomponent

    <!-- Content -->
    <div class="content p-4">
        <!-- Header -->
        <div class="mb-4">
            <h1>Editar Mesa #{{ $mesa->numero }}</h1>
            <p class="text-muted">Atualize as informações da mesa</p>
        </div>

        <!-- Card do Formulário -->
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{route('mesas.update', $mesa)}}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <!-- Número da Mesa -->
                        <div class="col-md-6 mb-3">
                            <label for="numero" class="form-label">Número da Mesa <span class="text-danger">*</span></label>
                            <input 
                                type="number" 
                                class="form-control @error('numero') is-invalid @enderror" 
                                id="numero" 
                                name="numero" 
                                placeholder="Ex: 1, 2, 3..."
                                value="{{ old('numero', $mesa->numero) }}"
                                required
                                min="1">
                            @error('numero')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">Número único para identificar a mesa</small>
                        </div>

                        <!-- Capacidade -->
                        <div class="col-md-6 mb-3">
                            <label for="quantidade" class="form-label">Capacidade (pessoas) <span class="text-danger">*</span></label>
                            <input 
                                type="number" 
                                class="form-control @error('quantidade') is-invalid @enderror" 
                                id="quantidade" 
                                name="quantidade" 
                                placeholder="Ex: 2, 4, 6..."
                                value="{{ old('quantidade', $mesa->quantidade) }}"
                                required
                                min="1"
                                max="20">
                            @error('quantidade')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">Número de pessoas que a mesa comporta</small>
                        </div>
                    </div>
                    
                    <hr class="my-4">

                    <!-- Botões -->
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Atualizar Mesa
                        </button>
                        <a href="{{ route('home') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Voltar
                        </a>
                        <button type="button" class="btn btn-danger ms-auto" data-bs-toggle="modal" data-bs-target="#deleteModal">
                            <i class="fas fa-trash"></i> Excluir Mesa
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Exibir mensagens de sucesso -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Exibir mensagens de erro -->
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>

    <!-- Modal de Confirmação de Exclusão -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirmar Exclusão</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Tem certeza que deseja excluir a Mesa #{{ $mesa->numero }}? Esta ação não pode ser desfeita.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <form action="{{ route('mesas.destroy', $mesa->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Sim, Excluir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        .card {
            border: none;
            border-radius: 8px;
        }
        
        .form-label {
            font-weight: 600;
            color: #2c3e50;
        }
        
        .text-danger {
            font-weight: bold;
        }
        
        .btn {
            font-weight: 500;
        }

        .ms-auto {
            margin-left: auto;
        }
    </style>
</body>
</html>