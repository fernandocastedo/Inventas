<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Listar productos
    public function index()
    {
        $tenantId = auth()->user()->tenant_id;
        $products = Product::forTenant($tenantId)->with('variants')->get();
        return view('products.index', compact('products'));
    }

    // Mostrar formulario de creación
    public function create()
    {
        return view('products.create');
    }

    // Guardar nuevo producto
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'category' => 'nullable',
            'status' => 'required',
        ]);
        $product = Product::create([
            'tenant_id' => auth()->user()->tenant_id,
            'name' => $request->name,
            'description' => $request->description,
            'category' => $request->category,
            'status' => $request->status,
        ]);
        return redirect()->route('products.index')->with('success', 'Producto creado correctamente.');
    }

    // Mostrar formulario de edición
    public function edit($id)
    {
        $tenantId = auth()->user()->tenant_id;
        $product = Product::forTenant($tenantId)->with('variants')->findOrFail($id);
        return view('products.edit', compact('product'));
    }

    // Actualizar producto y variantes
    public function update(Request $request, $id)
    {
        $tenantId = auth()->user()->tenant_id;
        $product = Product::forTenant($tenantId)->findOrFail($id);
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
        ]);
        $product->update($request->only(['name', 'description', 'price']));
        return redirect()->route('products.index')->with('success', 'Producto actualizado correctamente.');
    }

    // Eliminar producto
    public function destroy($id)
    {
        $tenantId = auth()->user()->tenant_id;
        $product = Product::forTenant($tenantId)->findOrFail($id);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Producto eliminado correctamente.');
    }
} 