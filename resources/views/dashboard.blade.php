@extends('layouts.dashboard')

@section('content')
    <div id="usuarios" class="mb-4">
        <h4>Usuarios</h4>
        <a href="{{ route('users.index') }}" class="btn btn-primary">Ir a gestión de usuarios</a>
    </div>
    <div id="productos" class="mb-4">
        <h4>Productos</h4>
        <a href="{{ route('products.index') }}" class="btn btn-success">Ir a gestión de productos</a>
    </div>
    <div id="ventas" class="mb-4">
        <h4>Ventas</h4>
        <a href="{{ route('orders.index') }}" class="btn btn-primary">Ir a gestión de ventas</a>
    </div>
    <div id="reportes" class="mb-4">
        <h4>Reportes</h4>
        <p>Sección no funcional. Aquí se mostraría la generación de reportes.</p>
    </div>
@endsection 