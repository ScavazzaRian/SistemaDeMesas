<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastrar Pedido</title>
    
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

    <div class="content p-4">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-sm">
                    <div class="card-header bg-success text-white">
                        <h4 class="mb-0">
                            <i class="bi bi-plus-circle"></i> Cadastrar Novo Pedido
                        </h4>
                    </div>
                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Atenção!</strong> Corrija os erros abaixo:
                                <ul class="mb-0 mt-2">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="bi bi-check-circle"></i> {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <form action="{{ route('pedido-produto.store') }}" method="POST" id="formPedido">
                            @csrf

                            <!-- Seleção de Mesa -->
                            <div class="mb-4">
                                <label for="mesa_id" class="form-label">
                                    <i class="bi bi-table"></i> Selecione a Mesa <span class="text-danger">*</span>
                                </label>
                                <select class="form-select @error('mesa_id') is-invalid @enderror" 
                                        id="mesa_id" 
                                        name="mesa_id" 
                                        required>
                                    <option value="">Escolha uma mesa...</option>
                                    @foreach($mesas as $mesa)
                                        <option value="{{ $mesa->id }}" {{ old('mesa_id') == $mesa->id ? 'selected' : '' }}>
                                            Mesa, lugares: {{ $mesa->quantidade }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('mesa_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <hr class="my-4">

                            <h5 class="mb-3"><i class="bi bi-basket"></i> Adicionar Produtos ao Pedido</h5>

                            <!-- Seleção de Produto -->
                            <div class="row">
                                <div class="col-md-5 mb-3">
                                    <label for="produto_id" class="form-label">Produto <span class="text-danger">*</span></label>
                                    <select class="form-select" id="produto_id">
                                        <option value="">Escolha um produto...</option>
                                        @foreach($produtos as $produto)
                                            <option value="{{ $produto->id }}" 
                                                    data-nome="{{ $produto->nome }}"
                                                    data-preco="{{ $produto->preco_venda }}">
                                                {{ $produto->nome }} - R$ {{ number_format($produto->preco_venda, 2, ',', '.') }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-2 mb-3">
                                    <label for="quantidade" class="form-label">Quantidade <span class="text-danger">*</span></label>
                                    <input type="number" 
                                           class="form-control" 
                                           id="quantidade" 
                                           value="1"
                                           min="1">
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="preco_unitario" class="form-label">Preço Unit. (R$) <span class="text-danger">*</span></label>
                                    <input type="number" 
                                           class="form-control" 
                                           id="preco_unitario" 
                                           step="0.01"
                                           min="0.01"
                                           readonly>
                                </div>

                                <div class="col-md-2 mb-3">
                                    <label class="form-label">&nbsp;</label>
                                    <button type="button" class="btn btn-primary w-100" id="btnAdicionar">
                                        <i class="bi bi-plus-lg"></i> Adicionar
                                    </button>
                                </div>
                            </div>

                            <!-- Lista de Itens Adicionados -->
                            <div id="itensPedido" class="mb-4" style="display: none;">
                                <h6 class="mb-3"><i class="bi bi-list-check"></i> Itens do Pedido</h6>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Produto</th>
                                                <th class="text-center">Quantidade</th>
                                                <th class="text-end">Preço Unit.</th>
                                                <th class="text-end">Subtotal</th>
                                                <th class="text-center">Ação</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tabelaItens"></tbody>
                                        <tfoot class="table-light">
                                            <tr>
                                                <td colspan="3" class="text-end"><strong>Total do Pedido:</strong></td>
                                                <td class="text-end">
                                                    <strong class="text-success fs-5" id="totalPedido">R$ 0,00</strong>
                                                </td>
                                                <td></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>

                            <!-- Inputs Hidden para enviar os itens -->
                            <div id="inputsHidden"></div>

                            <div class="d-flex justify-content-between mt-4">
                                <a href="{{ route('pedidos') }}" class="btn btn-secondary">
                                    <i class="bi bi-arrow-left"></i> Voltar
                                </a>
                                <button type="submit" class="btn btn-success" id="btnFinalizar" disabled>
                                    <i class="bi bi-check-circle"></i> Finalizar Pedido
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        let itens = [];
        let itemId = 0;

        // Preencher preço quando selecionar produto
        document.getElementById('produto_id').addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const preco = selectedOption.getAttribute('data-preco');
            document.getElementById('preco_unitario').value = preco || '';
        });

        // Adicionar item à lista
        document.getElementById('btnAdicionar').addEventListener('click', function() {
            const produtoSelect = document.getElementById('produto_id');
            const quantidade = parseInt(document.getElementById('quantidade').value);
            const preco = parseFloat(document.getElementById('preco_unitario').value);

            if (!produtoSelect.value) {
                alert('Selecione um produto!');
                return;
            }

            if (!quantidade || quantidade < 1) {
                alert('Informe uma quantidade válida!');
                return;
            }

            if (!preco || preco < 0.01) {
                alert('Informe um preço válido!');
                return;
            }

            const selectedOption = produtoSelect.options[produtoSelect.selectedIndex];
            const produtoNome = selectedOption.getAttribute('data-nome');
            const produtoId = produtoSelect.value;
            const subtotal = quantidade * preco;

            const item = {
                id: itemId++,
                produto_id: produtoId,
                produto_nome: produtoNome,
                quantidade: quantidade,
                preco_unitario: preco,
                subtotal: subtotal
            };

            itens.push(item);
            atualizarTabela();
            
            // Limpar campos
            produtoSelect.value = '';
            document.getElementById('quantidade').value = 1;
            document.getElementById('preco_unitario').value = '';
        });

        function atualizarTabela() {
            const tbody = document.getElementById('tabelaItens');
            const inputsDiv = document.getElementById('inputsHidden');
            
            tbody.innerHTML = '';
            inputsDiv.innerHTML = '';
            
            let total = 0;

            itens.forEach((item, index) => {
                total += item.subtotal;

                // Adicionar linha na tabela
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td>${item.produto_nome}</td>
                    <td class="text-center">${item.quantidade}</td>
                    <td class="text-end">R$ ${item.preco_unitario.toFixed(2).replace('.', ',')}</td>
                    <td class="text-end">R$ ${item.subtotal.toFixed(2).replace('.', ',')}</td>
                    <td class="text-center">
                        <button type="button" class="btn btn-sm btn-danger" onclick="removerItem(${item.id})">
                            <i class="bi bi-trash"></i>
                        </button>
                    </td>
                `;
                tbody.appendChild(tr);

                // Adicionar inputs hidden
                inputsDiv.innerHTML += `
                    <input type="hidden" name="produtos[${index}][produto_id]" value="${item.produto_id}">
                    <input type="hidden" name="produtos[${index}][quantidade]" value="${item.quantidade}">
                    <input type="hidden" name="produtos[${index}][preco_unitario_vendido]" value="${item.preco_unitario}">
                `;
            });

            document.getElementById('totalPedido').textContent = 
                'R$ ' + total.toLocaleString('pt-BR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

            // Mostrar/ocultar tabela e habilitar botão
            document.getElementById('itensPedido').style.display = itens.length > 0 ? 'block' : 'none';
            document.getElementById('btnFinalizar').disabled = itens.length === 0;
        }

        function removerItem(id) {
            itens = itens.filter(item => item.id !== id);
            atualizarTabela();
        }

        // Validar antes de submeter
        document.getElementById('formPedido').addEventListener('submit', function(e) {
            if (itens.length === 0) {
                e.preventDefault();
                alert('Adicione pelo menos um produto ao pedido!');
            }
        });
    </script>
</body>
</html>