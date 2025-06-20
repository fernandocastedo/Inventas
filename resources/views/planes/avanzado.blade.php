@extends('layouts.landing')

@section('title', 'Plan Avanzado | InVentas')

@section('content')
<div class="container py-5">
    <div class="text-center mb-4">
        <img src="/images/plan_avanzado.png" alt="Plan Avanzado" style="height:100px;">
        <h2 class="fw-bold mt-3">Plan Avanzado</h2>
        <p class="lead">Para negocios en crecimiento que necesitan más control y herramientas avanzadas.</p>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-7">
            <h4>¿Qué incluye?</h4>
            <ul class="list-group mb-4">
                <li class="list-group-item">✔ Inventario ilimitado</li>
                <li class="list-group-item">✔ Hasta 5 usuarios</li>
                <li class="list-group-item">✔ Gestión de ventas y pedidos</li>
                <li class="list-group-item">✔ Reportes avanzados</li>
                <li class="list-group-item">✔ Soporte por chat</li>
            </ul>
            <div class="alert alert-success">¡Prueba gratis por 14 días! Luego solo $150 USD/año.</div>
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="card p-4 shadow-sm" method="POST" action="{{ route('planes.avanzado.post') }}">
                @csrf
                <h5 class="mb-3">Datos para activar tu prueba</h5>
                <div class="mb-3">
                    <input type="text" name="nombre" class="form-control" placeholder="Nombre completo" required value="{{ old('nombre') }}">
                </div>
                <div class="mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Correo electrónico" required value="{{ old('email') }}">
                </div>
                <div class="mb-3">
                    <input type="text" name="empresa" class="form-control" placeholder="Empresa o tienda (opcional)" value="{{ old('empresa') }}">
                </div>
                <div class="mb-3">
                    <input type="text" name="tarjeta" class="form-control" placeholder="Tarjeta de crédito (simulado)" required value="{{ old('tarjeta') }}">
                </div>
                <button type="submit" class="btn btn-dark btn-lg w-100">Activar prueba gratis</button>
            </form>
        </div>
    </div>
</div>
@endsection 