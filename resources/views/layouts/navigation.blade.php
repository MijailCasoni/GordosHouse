{{-- resources/views/layouts/navigation.blade.php --}}
<nav class="navbar navbar-expand-lg navbar-light bg-pastel-primary dark:bg-dark-primary shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
            <img
                src="{{ asset('img/logo.png') }}"
                alt="Logo"
                class="navbar-logo me-2"
                style="width: 60px; height: auto;"
            >
            <span class="gordos-house-text">GORDO'S HOUSE</span>
        </a>

        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#top">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#nosotros-carousel">Nosotros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#galery-products">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#reviews-section">Reseñas Recientes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact-section">Contacto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#locations-section">Locales</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Intranet</a>
                </li>
            </ul>
        </div>
    </div>
</nav>