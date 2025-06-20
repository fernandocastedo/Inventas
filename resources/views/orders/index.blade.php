@extends('dashboard')

@section('content')
<div class="container mt-4">
    <h2>Ventas</h2>
    <a href="{{ route('orders.create') }}" class="btn btn-primary mb-3">Registrar nueva venta</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Total</th>
                <th>Estado</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->order_id }}</td>
                    <td>{{ $order->user->email ?? '-' }}</td>
                    <td>{{ $order->total_amount }}</td>
                    <td>{{ $order->status }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td>
                        <a href="{{ route('orders.show', $order->order_id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('orders.edit', $order->order_id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('orders.destroy', $order->order_id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar esta venta?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection 