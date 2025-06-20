@extends('layouts.dashboard')

@section('content')
<div class="container py-5">
    <div class="text-center mb-4">
        <img src="/images/plan_basico.png" alt="Plan Inicial" style="height:100px;">
        <h2 class="fw-bold mt-3">Plan Inicial</h2>
        <p class="lead">¡Comienza gratis! Ideal para emprendedores que inician en el mundo de la bisutería y accesorios.</p>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-7">
            <h4>¿Qué incluye?</h4>
            <ul class="list-group mb-4">
                <li class="list-group-item">✔ Gestión básica de inventario</li>
                <li class="list-group-item">✔ Hasta 10 productos</li>
                <li class="list-group-item">✔ 1 usuario administrador</li>
                <li class="list-group-item">✔ Reportes simples</li>
            </ul>
            <div class="alert alert-info">No necesitas tarjeta de crédito para comenzar. ¡Regístrate y prueba la plataforma!</div>
            <a href="/register" class="btn btn-success btn-lg w-100">Crear cuenta gratuita</a>
        </div>
    </div>
</div>
@endsection 