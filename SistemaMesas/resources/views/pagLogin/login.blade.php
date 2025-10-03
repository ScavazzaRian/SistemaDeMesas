<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/styleLogin.css') }}">

<section class="login-section">
    <div class="row g-0 h-100" style="min-height: 100vh;">
        <div class="col-lg-4 d-flex align-items-center justify-content-center login-side">
            <div class="login-container" style="max-width: 400px; width: 100%; padding: 2rem;">

                <div class="text-center logo-container">
                    <img src="{{ asset('img/chef.png') }}" alt="Cheff System Logo" style="width: 270px; height: 270px;">
                    <h1 class="brand-title">Cheff System</h1>
                </div>
                <form method="POST" action="{{ route('login.post') }}">
                    @csrf
                    <div class="mb-4">
                        <label class="form-label fw-semibold" for="emailInput">Email</label>
                        <input name='email' type="email" id="emailInput"
                            class="form-control form-control-lg @error('email') is-invalid @enderror"
                            placeholder="seu@email.com" value="{{ old('email') }}" />
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-semibold" for="passwordInput">Senha</label>
                        <input name='password' type="password" id="passwordInput"
                            class="form-control form-control-lg @error('password') is-invalid @enderror"
                            placeholder="••••••••" />
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
            <div class="mb-4">
                <button class="btn btn-primary-custom btn-lg w-100" type="submit">
                    Entrar
                </button>
            </div>
            <div class="text-center pt-3 border-top">
                <p class="text-muted mb-3">Ainda não é assinante?</p>
                <button type="button" class="btn btn-outline-custom">
                    Assine Agora
                </button>
            </div>
            </form>
        </div>
    </div>
    <div class="col-lg-8 d-none d-lg-flex align-items-center justify-content-center image-side">
        <img src="{{ asset('img/pexels-elevate-1267320.jpg') }}" alt="Chef preparando comida">
    </div>
    </div>
</section>
