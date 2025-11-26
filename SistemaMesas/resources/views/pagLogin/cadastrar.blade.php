<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title', 'Sistema')</title>

    <link rel="stylesheet" href="{{ asset('css/cadastrar.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>

    <div class="register-container">

    <h2 class="register-title">Criar Conta</h2>

    <form action="{{ route('cadastrar.post') }}" method="POST">
        @csrf
        <!-- Nome -->
        <div class="mb-3">
            <label class="form-label">Nome Completo</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label class="form-label">E-mail</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <!-- Senha -->
        <div class="mb-3">
            <label class="form-label">Senha</label>
            <input type="password" name="password" class="form-control" required minlength="6">
        </div>

        <button type="submit" class="btn btn-register">Cadastrar</button>
    </form>
    <a href="{{ route('login') }}" class="register-link">Já tenho conta</a>
</div>

</body>
</html>