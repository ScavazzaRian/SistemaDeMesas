<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastrar Mesa</title>
</head>
<body>
    @component('layouts._components.sidebar_menu')
    @endcomponent

    <!-- Content -->
    <div class="content p-4">
        <!-- Header -->
        <div class="mb-4">
            <h1>Cadastrar Mesa</h1>
            <p class="text-muted">Adicione uma nova mesa ao sistema</p>
        </div>

        <!-- Card do Formulário -->
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="#" method="POST">
                    @csrf
                    
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
                                value="{{ old('numero') }}"
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
                                value="{{ old('quantidade', 4) }}"
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
                        <a href="{{route('mesas.create')}}">
                            <button type="submit" class="btn btn-success">
                            <i class="fas fa-save"></i> Salvar Mesa
                            </button>
                        </a>
                        <a href="{{route('home')}}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Voltar
                        </a>
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
    </style>
</body>
</html>