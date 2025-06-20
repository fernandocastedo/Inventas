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
        // Por ahora, filtramos por tenant_id=1 (puedes cambiar esto por el tenant del usuario logueado)
        $products = Product::where('tenant_id', 1)->with('variants')->get();
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
            'tenant_id' => 1, // Cambia por el tenant real
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
        $product = Product::with('variants')->findOrFail($id);
        return view('products.edit', compact('product'));
    }

    // Actualizar producto y variantes
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'category' => 'nullable',
            'status' => 'required',
            'variants.*.name' => 'required',
            'variants.*.price' => 'required|numeric',
            'variants.*.stock' => 'required|integer',
        ]);
        $product = Product::findOrFail($id);
        $product->update($request->only(['name', 'description', 'category', 'status']));

        // Actualizar variantes
        $variantIds = [];
        if ($request->has('variants')) {
            foreach ($request->variants as $variantData) {
                if (isset($variantData['variant_id'])) {
                    // Actualizar variante existente
                    $variant = $product->variants()->where('variant_id', $variantData['variant_id'])->first();
                    if ($variant) {
                        $variant->update([
                            'name' => $variantData['name'],
                            'price' => $variantData['price'],
                            'stock' => $variantData['stock'],
                        ]);
                        $variantIds[] = $variant->variant_id;
                    }
                } else {
                    // Crear nueva variante
                    $newVariant = $product->variants()->create([
                        'name' => $variantData['name'],
                        'price' => $variantData['price'],
                        'stock' => $variantData['stock'],
                    ]);
                    $variantIds[] = $newVariant->variant_id;
                }
            }
        }
        // Eliminar variantes que no están en el formulario
        $product->variants()->whereNotIn('variant_id', $variantIds)->delete();

        return redirect()->route('products.edit', $product->product_id)->with('success', 'Producto y variantes actualizados correctamente.');
    }

    // Eliminar producto
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        // Eliminar variantes asociadas
        $product->variants()->delete();
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Producto eliminado correctamente.');
    }
} 