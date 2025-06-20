@extends('layouts.dashboard')

@section('content')
<div class="container mt-4">
    <h2>Editar venta #{{ $order->order_id }}</h2>
    <a href="{{ route('orders.index') }}" class="btn btn-secondary mb-3">Volver a ventas</a>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('orders.update', $order->order_id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="user_id" class="form-label">Usuario</label>
            <select name="user_id" id="user_id" class="form-control" required>
                <option value="">Seleccione un usuario</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $order->user_id == $user->id ? 'selected' : '' }}>{{ $user->email }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="cart_id" class="form-label">Carrito</label>
            <select name="cart_id" id="cart_id" class="form-control" required readonly disabled>
                <option value="{{ $order->cart_id }}">Carrito #{{ $order->cart_id }}</option>
            </select>
            <input type="hidden" name="cart_id" value="{{ $order->cart_id }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Detalle de productos</label>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Variante</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->cart->items as $i => $item)
                        <tr>
                            <td>
                                {{ $item->variant->product->name ?? '-' }}
                            </td>
                            <td>
                                <select name="items[{{ $i }}][variant_id]" class="form-control variant-select" data-index="{{ $i }}">
                                    @foreach($variants as $variant)
                                        <option value="{{ $variant->variant_id }}" data-price="{{ $variant->price }}" {{ $item->variant_id == $variant->variant_id ? 'selected' : '' }}>
                                            {{ $variant->product->name }} - {{ $variant->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <span class="price" id="price-{{ $i }}">{{ $item->variant->price }}</span>
                            </td>
                            <td>
                                <input type="number" name="items[{{ $i }}][quantity]" class="form-control quantity-input" data-index="{{ $i }}" value="{{ $item->quantity }}" min="1">
                            </td>
                            <td>
                                <span class="subtotal" id="subtotal-{{ $i }}">{{ $item->variant->price * $item->quantity }}</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mb-3">
            <label for="total_amount" class="form-label">Total</label>
            <input type="number" step="0.01" name="total_amount" id="total_amount" class="form-control" value="{{ $order->total_amount }}" readonly>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Estado</label>
            <select name="status" id="status" class="form-control" required>
                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pendiente</option>
                <option value="paid" {{ $order->status == 'paid' ? 'selected' : '' }}>Pagado</option>
                <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Enviado</option>
                <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelado</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Actualizar venta</button>
    </form>
</div>
<script>
    // JS para actualizar precios y subtotales dinámicamente
    document.querySelectorAll('.variant-select').forEach(function(select) {
        select.addEventListener('change', function() {
            var index = this.dataset.index;
            var price = this.options[this.selectedIndex].getAttribute('data-price');
            document.getElementById('price-' + index).innerText = price;
            var quantity = document.querySelector('input.quantity-input[data-index="' + index + '"]').value;
            document.getElementById('subtotal-' + index).innerText = (price * quantity).toFixed(2);
            updateTotal();
        });
    });
    document.querySelectorAll('.quantity-input').forEach(function(input) {
        input.addEventListener('input', function() {
            var index = this.dataset.index;
            var price = document.querySelector('select.variant-select[data-index="' + index + '"]').options[
                document.querySelector('select.variant-select[data-index="' + index + '"]').selectedIndex
            ].getAttribute('data-price');
            document.getElementById('subtotal-' + index).innerText = (price * this.value).toFixed(2);
            updateTotal();
        });
    });
    function updateTotal() {
        var total = 0;
        document.querySelectorAll('.subtotal').forEach(function(span) {
            total += parseFloat(span.innerText);
        });
        document.getElementById('total_amount').value = total.toFixed(2);
    }
</script>
@endsection 