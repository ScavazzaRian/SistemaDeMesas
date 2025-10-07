<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cheff System - Início</title>

    <!-- Font Awesome e Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <!-- Seus estilos -->
    <link rel="stylesheet" href="{{ asset('css/styleSideBar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styleIndex.css') }}">
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar-->
        <aside id="sidebar">
            <div class="sidebar-header">
                <div class="logo-section">
                    <a href="{{ route('index') }}">
                        <img src="{{ asset('img/chef.png') }}" alt="Chef Logo" class="sidebar-logo-img">
                        <div class="logo-text">
                            <span class="brand-name">Cheff System</span>
                        </div>
                    </a>
                </div>
                <button id="toggle-btn" type="button">
                    <i class="fas fa-bars"></i>
                </button>
            </div>

            <form method="POST" action="{{ route('logout.post') }}" id="logout-form" style="display: none;">
                @csrf
            </form>
        </aside>

        <!-- Conteúdo principal -->
        <div class="main">
            <!-- Cabeçalho Mobile -->
            <div class="mobile-header">
                <button id="mobile-toggle" type="button">
                    <i class="fas fa-bars"></i>
                </button>
                <h5 class="mb-0">Cheff System</h5>
            </div>

            <div class="sidebar-overlay" id="sidebar-overlay"></div>

            <!-- Hero Section -->
            <section class="hero">
                <div class="container">
                    <h1>Bem-vindo ao Cheff System</h1>
                    <p>Gerencie mesas, pedidos e estoque de forma prática, moderna e eficiente — tudo em um só lugar.</p>

                    <!-- Botão moderno -->
                    <a href="{{ route('login') }}" class="btn btn-start-modern btn-lg">
                        Começar Agora <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </section>


            <!-- Seção de Recursos -->
            <section class="features">
                <div class="container text-center">
                    <h2 class="mb-5 fw-bold">O que o Cheff System oferece</h2>
                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="card p-4">
                                <i class="fas fa-chair"></i>
                                <h5 class="fw-bold">Gestão de Mesas</h5>
                                <p>Visualize facilmente as mesas ocupadas e disponíveis do seu restaurante.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card p-4">
                                <i class="fas fa-box-open"></i>
                                <h5 class="fw-bold">Controle de Estoque</h5>
                                <p>Gerencie seus produtos e ingredientes de forma automatizada e organizada.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card p-4">
                                <i class="fas fa-chart-line"></i>
                                <h5 class="fw-bold">Relatórios e Análises</h5>
                                <p>Monitore o desempenho e obtenha insights sobre o seu restaurante.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Rodapé -->
            <footer class="footer">
                <p>&copy; 2025 Cheff System. Todos os direitos reservados.</p>
            </footer>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/scriptSideBar.js') }}"></script>
</body>

</html>