<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Añadir nuevo producto</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-4">
    <!-- Indicador de pestañas -->
    <ul class="nav nav-tabs mb-4">
        <li class="nav-item">
            <a class="nav-link" href="/">Inicio</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active text-white bg-primary" aria-current="page" href="#">Productos / Añadir nuevo producto</a>
        </li>
    </ul>

    <!-- Título principal -->
    <h2 class="fw-bold">Añadir nuevo producto</h2>
    <p class="text-muted mb-4">Añadir nuevo producto a su tienda.</p>

    <!-- Formulario -->
    <form action="/products/store" method="POST">
        <!-- Nombre y descripción -->
        <div class="card mb-4">
            <div class="card-header fw-semibold">Nombre y descripción</div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="productName" class="form-label">Nombre de producto</label>
                    <input type="text" class="form-control" id="productName" name="name" placeholder="Ingrese el nombre" required>
                </div>
                <div class="mb-3">
                    <label for="productDescription" class="form-label">Descripción de producto</label>
                    <textarea class="form-control" id="productDescription" name="description" rows="4" placeholder="Ingrese la descripción" required></textarea>
                </div>
            </div>
        </div>

        <!-- Categoría -->
        <div class="card mb-4">
            <div class="card-header fw-semibold">Categoría</div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="productCategory" class="form-label">Categoría del producto</label>
                    <select class="form-select" id="productCategory" name="category" required>
                        <option value="" selected disabled>Seleccione una categoría</option>
                        <option value="electronics">Electrónica</option>
                        <option value="clothing">Ropa</option>
                        <option value="home">Hogar</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Botón de envío -->
        <button type="submit" class="btn btn-primary">Añadir producto</button>
    </form>
</div>

<!-- Bootstrap JS (opcional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>