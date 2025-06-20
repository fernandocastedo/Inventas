<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'InVentas')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/landing_page.css') }}" rel="stylesheet">
</head>
<body class="bg-light">
    <header class="bg-dark text-white py-3 mb-4">
        <div class="container d-flex justify-content-between align-items-center">
            <a href="/" class="navbar-brand text-white fw-bold fs-3">InVentas</a>
            <nav>
                <ul class="list-unstyled d-flex mb-0">
                    <li><a href="/" class="text-white mx-3">Inicio</a></li>
                    <li><a href="/#planes" class="text-white mx-3">Planes</a></li>
                    <li><a href="/login" class="btn btn-warning ms-3">Login</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        @yield('content')
    </main>
    <footer class="bg-dark text-white text-center py-4 mt-5">
        <p>&copy; 2025 InVentas. Todos los derechos reservados.</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 