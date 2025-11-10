<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/styleSideBar.css') }}">

<body>
    <div class="wrapper">
        <aside id="sidebar">
            <!-- Logo e Toggle -->
            <div class="sidebar-header">
                <div class="logo-section">
                    <a href="{{ route('home') }}">
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

            <!-- Menu Navigation -->
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="{{ route('home') }}" class="sidebar-link {{ request()->routeIs('home') ? 'active' : '' }}">
                        <i class="fas fa-utensils"></i>
                        <span>Mesas</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('marmitas')}}" class="sidebar-link {{ request()->routeIs('marmitas') ? 'active' : '' }}">
                        <i class="fas fa-box"></i>
                        <span>Marmitas</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('produtos') }}"
                        class="sidebar-link {{ request()->routeIs('produtos*') ? 'active' : '' }}">
                        <i class="fas fa-shopping-cart"></i>
                        <span>Produtos</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link {{ request()->routeIs('reservas') ? 'active' : '' }}">
                        <i class="fas fa-chart-bar"></i>
                        <span>Relatórios</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('relatorios') }}"
                        class="sidebar-link has-dropdown"
                        data-bs-target="#relatorios" aria-expanded="false"
                        aria-controls="relatorios">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
            </ul>

            <!-- Footer -->
            <form method="POST" action="{{ route('logout.post') }}" id="logout-form" style="display: none;">
                @csrf
            </form>

            <div class="sidebar-footer">
                <a href="#" class="sidebar-link"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Sair</span>
                </a>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="main">
            <!-- Mobile Header -->
            <div class="mobile-header">
                <button id="mobile-toggle" type="button">
                    <i class="fas fa-bars"></i>
                </button>
                <h5 class="mb-0">Cheff System</h5>
            </div>

            <!-- Overlay para mobile -->
            <div class="sidebar-overlay" id="sidebar-overlay"></div>


            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
            </script>
            <script src="{{ asset('js/scriptSideBar.js') }}"></script>
</body>
