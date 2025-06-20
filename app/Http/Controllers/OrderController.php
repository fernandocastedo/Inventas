<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Listar todas las ventas
    public function index()
    {
        $orders = Order::with(['user', 'cart.items.variant'])->orderBy('created_at', 'desc')->get();
        return view('orders.index', compact('orders'));
    }

    // Mostrar formulario de creación de venta
    public function create()
    {
        $users = User::all();
        $carts = Cart::whereDoesntHave('order')->get(); // Carritos sin venta asociada
        return view('orders.create', compact('users', 'carts'));
    }

    // Guardar una nueva venta
    public function store(Request $request)
    {
        $request->validate([
            'cart_id' => 'required|exists:Cart,cart_id',
            'user_id' => 'required|exists:User,user_id',
            'total_amount' => 'required|numeric',
            'status' => 'required',
        ]);
        $order = Order::create($request->only(['cart_id', 'user_id', 'total_amount', 'status']));
        return redirect()->route('orders.index')->with('success', 'Venta registrada correctamente.');
    }

    // Mostrar detalle de una venta
    public function show($id)
    {
        $order = Order::with(['user', 'cart.items.variant'])->findOrFail($id);
        return view('orders.show', compact('order'));
    }

    // Mostrar formulario de edición
    public function edit($id)
    {
        $order = Order::with(['cart.items.variant.product'])->findOrFail($id);
        $users = User::all();
        $carts = Cart::all();
        // Obtener todas las variantes para permitir cambiar productos en el detalle
        $variants = \App\Models\ProductVariant::with('product')->get();
        return view('orders.edit', compact('order', 'users', 'carts', 'variants'));
    }

    // Actualizar una venta
    public function update(Request $request, $id)
    {
        \Log::info('Order update request', $request->all());
        $request->validate([
            'cart_id' => 'required|exists:Cart,cart_id',
            'user_id' => 'required|exists:User,user_id',
            'status' => 'required',
            'items' => 'required|array',
            'items.*.variant_id' => 'required|exists:ProductVariant,variant_id',
            'items.*.quantity' => 'required|integer|min:1',
        ]);
        $order = Order::findOrFail($id);
        $order->update($request->only(['cart_id', 'user_id', 'status']));
        // Actualizar los items del carrito
        $cart = $order->cart;
        $cart->items()->delete();
        $total = 0;
        foreach ($request->items as $item) {
            $variant = \App\Models\ProductVariant::find($item['variant_id']);
            $subtotal = $variant->price * $item['quantity'];
            $total += $subtotal;
            $cart->items()->create([
                'variant_id' => $item['variant_id'],
                'quantity' => $item['quantity'],
            ]);
        }
        $order->total_amount = $total;
        $order->save();
        return redirect()->route('orders.index')->with('success', 'Venta actualizada correctamente.');
    }

    // Eliminar una venta
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $cart = $order->cart;

        // Eliminar los pagos asociados a la venta
        \DB::table('payment')->where('order_id', $order->order_id)->delete();

        // Eliminar la venta
        $order->delete();

        // Eliminar el carrito y sus items
        if ($cart) {
            $cart->items()->delete();
            $cart->delete();
        }

        return redirect()->route('orders.index')->with('success', 'Venta eliminada correctamente.');
    }
} 