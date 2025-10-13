<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Marmita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    @component('layouts._components.sidebar_menu')
    @endcomponent

    <div class="content p-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <!-- Header -->
                    <div class="mb-4">
                        <h1>Editar Marmita</h1>
                        <p class="text-muted">Atualize os dados do pedido</p>
                    </div>

                    <!-- Formulário -->
                    <div class="card shadow-sm">
                        <div class="card-body p-4">
                            <form action="{{ route('marmitas.update', $marmita->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <!-- Nome Cliente -->
                                <div class="mb-3">
                                    <label for="nome_cliente" class="form-label">Nome do Cliente <span class="text-danger">*</span></label>
                                    <input type="text" 
                                           name="nome_cliente" 
                                           id="nome_cliente" 
                                           class="form-control @error('nome_cliente') is-invalid @enderror"
                                           value="{{ old('nome_cliente', $marmita->nome_cliente) }}">
                                    @error('nome_cliente')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Telefone -->
                                <div class="mb-3">
                                    <label for="telefone" class="form-label">Telefone <span class="text-danger">*</span></label>
                                    <input type="text" 
                                           name="telefone" 
                                           id="telefone" 
                                           class="form-control @error('telefone') is-invalid @enderror"
                                           value="{{ old('telefone', $marmita->telefone) }}">
                                    @error('telefone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Endereço -->
                                <div class="mb-3">
                                    <label for="endereco" class="form-label">Endereço <span class="text-danger">*</span></label>
                                    <input type="text" 
                                           name="endereco" 
                                           id="endereco" 
                                           class="form-control @error('endereco') is-invalid @enderror"
                                           value="{{ old('endereco', $marmita->endereco) }}">
                                    @error('endereco')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Tipo -->
                                <div class="mb-3">
                                    <label for="tipo" class="form-label">Tipo <span class="text-danger">*</span></label>
                                    <select name="tipo" id="tipo" class="form-select @error('tipo') is-invalid @enderror">
                                        <option value="">Selecione</option>
                                        <option value="pequena" {{ $marmita->tipo == 'pequena' ? 'selected' : '' }}>Pequena</option>
                                        <option value="média" {{ $marmita->tipo == 'média' ? 'selected' : '' }}>Média</option>
                                        <option value="grande" {{ $marmita->tipo == 'grande' ? 'selected' : '' }}>Grande</option>
                                    </select>
                                    @error('tipo')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Preço -->
                                <div class="mb-3">
                                    <label for="preco" class="form-label">Preço <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text">R$</span>
                                        <input type="number" 
                                               name="preco" 
                                               id="preco" 
                                               class="form-control @error('preco') is-invalid @enderror"
                                               value="{{ old('preco', $marmita->preco) }}" 
                                               step="0.01">
                                        @error('preco')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Status -->
                                <div class="mb-4">
                                    <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                                    <select name="status" id="status" class="form-select @error('status') is-invalid @enderror">
                                        <option value="preparando" {{ $marmita->status == 'preparando' ? 'selected' : '' }}>Preparando</option>
                                        <option value="entregue" {{ $marmita->status == 'entregue' ? 'selected' : '' }}>Entregue</option>
                                        <option value="cancelado" {{ $marmita->status == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Botões -->
                                <div class="d-flex gap-2">
                                    <a href="{{ route('marmitas') }}" class="btn btn-secondary">
                                        <i class="fas fa-arrow-left"></i> Voltar
                                    </a>
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-save"></i> Atualizar Marmita
                                    </button>
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
