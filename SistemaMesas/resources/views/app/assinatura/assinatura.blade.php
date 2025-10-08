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
</head>

<body>
    <div class="assinatura-wrapper">
        <div class="center-box">
            <h2>Confirme sua Assinatura</h2>
            <p>Verifique suas informações e confirme sua assinatura para continuar usando o Cheff System.</p>

            <div class="button-group">
                <button class="btn-confirmar">Confirmar</button>
                <a href="{{ route('login') }}" class="btn-conta btn">
                    Já tem conta? <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </div>
</body>

</html>