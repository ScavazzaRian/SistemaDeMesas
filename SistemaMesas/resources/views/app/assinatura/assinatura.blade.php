<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Central</title>

    <!-- Bootstrap e Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <!-- CSS personalizado -->
    <link rel="stylesheet" href="{{ asset('css/styleAssinatura.css') }}">

    <!-- SDK Mercado Pago -->
    <script src="https://sdk.mercadopago.com/js/v2"></script>
</head>

<body>
    <div class="assinatura-wrapper">
        <div class="center-box">
            <h2>Confirme sua Assinatura</h2>
            <p>Preencha seus dados para confirmar a assinatura e continuar usando o Cheff System.</p>

            <form action="{{ route('assinatura.create') }}" method="POST" id="payment-form">
                @csrf
                <!-- Dados do cliente -->
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome completo</label>
                    <input type="text" name="nome" id="nome" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="cpf" class="form-label">CPF</label>
                    <input type="text" name="cpf" id="cpf" class="form-control" required>
                </div>

                <!-- Dados do cartão -->
                <div class="mb-3">
                    <label for="cardNumber" class="form-label">Número do Cartão</label>
                    <input type="text" id="cardNumber" data-checkout="cardNumber" class="form-control" required>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="expirationMonth" class="form-label">Mês de validade</label>
                        <input type="text" id="expirationMonth" data-checkout="cardExpirationMonth" class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="expirationYear" class="form-label">Ano de validade</label>
                        <input type="text" id="expirationYear" data-checkout="cardExpirationYear" class="form-control" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="securityCode" class="form-label">Código de Segurança (CVV)</label>
                    <input type="text" id="securityCode" data-checkout="securityCode" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="cardholderName" class="form-label">Nome impresso no cartão</label>
                    <input type="text" id="cardholderName" data-checkout="cardholderName" class="form-control" required>
                </div>

                <!-- Botões -->
                <div class="button-group mt-4 d-flex flex-column gap-2">
                    <button type="submit" class="btn-confirmar btn btn-success w-100">
                        <i class="fas fa-credit-card me-2"></i> Confirmar Assinatura
                    </button>

                    <a href="{{ route('login') }}" class="btn-conta btn btn-outline-secondary w-100">
                        Já tem conta? <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Script para inicializar o Mercado Pago -->
    <script>
        const mp = new MercadoPago("SUA_PUBLIC_KEY_AQUI", { locale: "pt-BR" });
    </script>
</body>

</html>
