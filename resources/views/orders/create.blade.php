@extends('dashboard')

@section('content')
<div class="container mt-4">
    <h2>Registrar nueva venta</h2>
    <a href="{{ route('orders.index') }}" class="btn btn-secondary mb-3">Volver a ventas</a>
    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="user_id" class="form-label">Usuario</label>
            <select name="user_id" id="user_id" class="form-control" required>
                <option value="">Seleccione un usuario</option>
                @foreach($users as $user)
                    <option value="{{ $user->user_id }}">{{ $user->email }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="cart_id" class="form-label">Carrito</label>
            <select name="cart_id" id="cart_id" class="form-control" required>
                <option value="">Seleccione un carrito</option>
                @foreach($carts as $cart)
                    <option value="{{ $cart->cart_id }}">Carrito #{{ $cart->cart_id }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="total_amount" class="form-label">Total</label>
            <input type="number" step="0.01" name="total_amount" id="total_amount" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Estado</label>
            <select name="status" id="status" class="form-control" required>
                <option value="pending">Pendiente</option>
                <option value="paid">Pagado</option>
                <option value="shipped">Enviado</option>
                <option value="cancelled">Cancelado</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Registrar venta</button>
    </form>
</div>
@endsection 