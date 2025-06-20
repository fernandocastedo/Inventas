@extends('layouts.dashboard')

@section('content')
<div class="container mt-4">
    <h2>Detalle de Venta #{{ $order->order_id }}</h2>
    <a href="{{ route('orders.index') }}" class="btn btn-secondary mb-3">Volver a ventas</a>
    <div class="card mb-3">
        <div class="card-body">
            <p><strong>Usuario:</strong> {{ $order->user->email ?? '-' }}</p>
            <p><strong>Total:</strong> {{ $order->total_amount }}</p>
            <p><strong>Estado:</strong> {{ $order->status }}</p>
            <p><strong>Fecha:</strong> {{ $order->created_at }}</p>
        </div>
    </div>
    <h4>Productos vendidos</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Variante</th>
                <th>Precio</th>
                <th>Cantidad</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->cart->items as $item)
                <tr>
                    <td>{{ $item->variant->product->name ?? '-' }}</td>
                    <td>{{ $item->variant->name ?? '-' }}</td>
                    <td>{{ $item->variant->price ?? '-' }}</td>
                    <td>{{ $item->quantity }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection 