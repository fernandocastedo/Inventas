<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - InVentas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/landing_page.css') }}" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">InVentas Admin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#usuarios">Usuarios</a></li>
                    <li class="nav-item"><a class="nav-link" href="#productos">Productos</a></li>
                    <li class="nav-item"><a class="nav-link" href="#ventas">Ventas</a></li>
                    <li class="nav-item"><a class="nav-link" href="#reportes">Reportes</a></li>
                </ul>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-outline-light">Cerrar sesión</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <h2 class="mb-4">Panel de Administración</h2>
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    <a href="#usuarios" class="list-group-item list-group-item-action">Usuarios</a>
                    <a href="#productos" class="list-group-item list-group-item-action">Productos</a>
                    <a href="#ventas" class="list-group-item list-group-item-action">Ventas</a>
                    <a href="#reportes" class="list-group-item list-group-item-action">Reportes</a>
                </div>
            </div>
            <div class="col-md-9">
                <div id="usuarios" class="mb-4">
                    <h4>Usuarios</h4>
                    <p>Sección no funcional. Aquí se mostraría la gestión de usuarios.</p>
                </div>
                <div id="productos" class="mb-4">
                    <h4>Productos</h4>
                    <!-- Botón grande para agregar producto -->
                    <div class="mb-3">
                        <a href="{{ url('/add_product') }}" class="btn btn-primary btn-lg w-50" style="aspect-ratio:4/3; display:flex; align-items:center; justify-content:center;">
                            Agregar producto
                        </a>
                    </div>

                    <!-- Lista de productos -->
                    @if(isset($products) && count($products))
                        <div class="row gy-3">
                            @foreach($products as $product)
                                <div class="col-md-6 col-lg-4">
                                    <div class="card h-100">
                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-title">{{ $product->name }}</h5>
                                            <p class="card-text flex-grow-1">{{ Str::limit($product->description, 100) }}</p>
                                            <a href="{{ url('/update_product/'.$product->id) }}" class="btn btn-outline-primary mt-auto">Actualizar producto</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-muted">No hay productos agregados.</p>
                    @endif
                </div>
                <div id="ventas" class="mb-4">
                    <h4>Ventas</h4>
                    <p>Sección no funcional. Aquí se mostraría la gestión de ventas.</p>
                </div>
                <div id="reportes" class="mb-4">
                    <h4>Reportes</h4>
                    <p>Sección no funcional. Aquí se mostraría la generación de reportes.</p>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 