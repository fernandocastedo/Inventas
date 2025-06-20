@extends('layouts.landing')

@section('title', 'Plan Premium | InVentas')

@section('content')
<div class="container py-5">
    <div class="text-center mb-4">
        <img src="/images/plan_premium.png" alt="Plan Premium" style="height:100px;">
        <h2 class="fw-bold mt-3">Plan Premium</h2>
        <p class="lead">Para empresas y mayoristas que buscan la máxima personalización y soporte prioritario.</p>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-7">
            <h4>¿Qué incluye?</h4>
            <ul class="list-group mb-4">
                <li class="list-group-item">✔ Todo lo del plan Avanzado</li>
                <li class="list-group-item">✔ Usuarios ilimitados</li>
                <li class="list-group-item">✔ Multi-sucursal y multi-almacén</li>
                <li class="list-group-item">✔ Integración con marketplaces</li>
                <li class="list-group-item">✔ Soporte prioritario</li>
                <li class="list-group-item">✔ Personalización de reportes</li>
            </ul>
            <div class="alert alert-warning">Solicita una demo personalizada y recibe asesoría exclusiva antes de contratar.</div>
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
            <form class="card p-4 shadow-sm mb-3" method="POST" action="{{ route('planes.premium.demo') }}">
                @csrf
                <h5 class="mb-3">Solicitar demo o contacto</h5>
                <div class="mb-3">
                    <input type="text" name="nombre" class="form-control" placeholder="Nombre completo" required value="{{ old('nombre') }}">
                </div>
                <div class="mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Correo electrónico" required value="{{ old('email') }}">
                </div>
                <div class="mb-3">
                    <input type="text" name="empresa" class="form-control" placeholder="Empresa o tienda" required value="{{ old('empresa') }}">
                </div>
                <div class="mb-3">
                    <textarea name="mensaje" class="form-control" placeholder="¿Qué necesitas? (opcional)">{{ old('mensaje') }}</textarea>
                </div>
                <button type="submit" class="btn btn-dark btn-lg w-100">Solicitar demo</button>
            </form>
            <div class="text-center mt-4">
                <p class="mb-2">¿Ya tienes tu demo y quieres contratar?</p>
                <form method="POST" action="{{ route('planes.premium.contratar') }}">
                    @csrf
                    <button type="submit" class="btn btn-success btn-lg">Contratar y pagar $250 USD</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection 