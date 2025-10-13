<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Marmita</title>
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
                        <h1>Cadastrar Marmita</h1>
                        <p class="text-muted">Preencha os dados do novo pedido de marmita</p>
                    </div>

                    <!-- Card do Formulário -->
                    <div class="card shadow-sm">
                        <div class="card-body p-4">
                            <form action="{{ route('marmitas.create') }}" method="POST">
                                @csrf

                                <!-- Nome do Cliente -->
                                <div class="mb-3">
                                    <label for="nome_cliente" class="form-label">Nome do Cliente <span class="text-danger">*</span></label>
                                    <input type="text"
                                           name="nome_cliente"
                                           id="nome_cliente"
                                           class="form-control @error('nome_cliente') is-invalid @enderror"
                                           value="{{ old('nome_cliente') }}"
                                           placeholder="Ex: João da Silva">
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
                                           value="{{ old('telefone') }}"
                                           placeholder="Ex: (11) 98765-4321">
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
                                           value="{{ old('endereco') }}"
                                           placeholder="Ex: Rua das Flores, 123 - Centro">
                                    @error('endereco')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Tipo da Marmita -->
                                <div class="mb-3">
                                    <label for="tipo" class="form-label">Tipo da Marmita <span class="text-danger">*</span></label>
                                    <select name="tipo"
                                            id="tipo"
                                            class="form-select @error('tipo') is-invalid @enderror">
                                        <option value="">Selecione o tipo</option>
                                        <option value="pequena" {{ old('tipo') == 'pequena' ? 'selected' : '' }}>Pequena</option>
                                        <option value="média" {{ old('tipo') == 'média' ? 'selected' : '' }}>Média</option>
                                        <option value="grande" {{ old('tipo') == 'grande' ? 'selected' : '' }}>Grande</option>
                                    </select>
                                    @error('tipo')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Preço -->
                                <div class="mb-3">
                                    <label for="preco" class="form-label">Preço (R$)</label>
                                    <div class="input-group">
                                        <span class="input-group-text">R$</span>
                                        <input type="number"
                                               name="preco"
                                               id="preco"
                                               step="0.01"
                                               class="form-control @error('preco') is-invalid @enderror"
                                               value="{{ old('preco') }}"
                                               placeholder="0,00">
                                        @error('preco')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Status -->
                                <div class="mb-4">
                                    <label for="status" class="form-label">Status do Pedido <span class="text-danger">*</span></label>
                                    <select name="status"
                                            id="status"
                                            class="form-select @error('status') is-invalid @enderror">
                                        <option value="">Selecione o status</option>
                                        <option value="preparando" {{ old('status') == 'preparando' ? 'selected' : '' }}>Preparando</option>
                                        <option value="entregue" {{ old('status') == 'entregue' ? 'selected' : '' }}>Entregue</option>
                                        <option value="cancelado" {{ old('status') == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
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
                                        <i class="fas fa-save"></i> Cadastrar Marmita
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
