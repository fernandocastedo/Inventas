@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h2>Editar Producto</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <form action="{{ route('products.update', $product->product_id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descripción</label>
            <textarea name="description" id="description" class="form-control">{{ $product->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Categoría</label>
            <input type="text" name="category" id="category" class="form-control" value="{{ $product->category }}">
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Estado</label>
            <select name="status" id="status" class="form-control" required>
                <option value="active" @if($product->status=='active') selected @endif>Activo</option>
                <option value="inactive" @if($product->status=='inactive') selected @endif>Inactivo</option>
            </select>
        </div>
        <hr>
        <h4>Variantes</h4>
        <div id="variants-list">
            @foreach($product->variants as $i => $variant)
            <div class="row mb-2 variant-row">
                <input type="hidden" name="variants[{{ $i }}][variant_id]" value="{{ $variant->variant_id }}">
                <div class="col-md-4">
                    <input type="text" name="variants[{{ $i }}][name]" class="form-control" placeholder="Nombre variante" value="{{ $variant->name }}" required>
                </div>
                <div class="col-md-3">
                    <input type="number" step="0.01" name="variants[{{ $i }}][price]" class="form-control" placeholder="Precio" value="{{ $variant->price }}" required>
                </div>
                <div class="col-md-3">
                    <input type="number" name="variants[{{ $i }}][stock]" class="form-control" placeholder="Stock" value="{{ $variant->stock }}" required>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-danger btn-remove-variant">Eliminar</button>
                </div>
            </div>
            @endforeach
        </div>
        <button type="button" class="btn btn-secondary mb-3" id="add-variant">Agregar Variante</button>
        <br>
        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
<script>
    let variantIndex = {{ count($product->variants) }};
    document.getElementById('add-variant').onclick = function() {
        const list = document.getElementById('variants-list');
        const row = document.createElement('div');
        row.className = 'row mb-2 variant-row';
        row.innerHTML = `
            <div class="col-md-4">
                <input type="text" name="variants[${variantIndex}][name]" class="form-control" placeholder="Nombre variante" required>
            </div>
            <div class="col-md-3">
                <input type="number" step="0.01" name="variants[${variantIndex}][price]" class="form-control" placeholder="Precio" required>
            </div>
            <div class="col-md-3">
                <input type="number" name="variants[${variantIndex}][stock]" class="form-control" placeholder="Stock" required>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-danger btn-remove-variant">Eliminar</button>
            </div>
        `;
        list.appendChild(row);
        variantIndex++;
    };
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('btn-remove-variant')) {
            e.target.closest('.variant-row').remove();
        }
    });
</script>
@endsection 