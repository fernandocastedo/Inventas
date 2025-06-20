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
        $tenantId = auth()->user()->tenant_id;
        $orders = Order::whereHas('user', function($q) use ($tenantId) {
            $q->where('tenant_id', $tenantId);
        })->with(['user', 'cart.items.variant'])->orderBy('created_at', 'desc')->get();
        return view('orders.index', compact('orders'));
    }

    // Mostrar formulario de creación de venta
    public function create()
    {
        $tenantId = auth()->user()->tenant_id;
        $users = User::forTenant($tenantId)->get();
        $carts = Cart::whereIn('user_id', $users->pluck('user_id'))->whereDoesntHave('order')->get();
        return view('orders.create', compact('users', 'carts'));
    }

    // Guardar una nueva venta
    public function store(Request $request)
    {
        $tenantId = auth()->user()->tenant_id;
        $request->validate([
            'cart_id' => 'required|exists:Cart,cart_id',
            'user_id' => 'required|exists:User,user_id',
            'total_amount' => 'required|numeric',
            'status' => 'required',
        ]);
        // Validar que el user_id y cart_id pertenezcan al tenant
        $user = User::forTenant($tenantId)->findOrFail($request->user_id);
        $cart = Cart::where('cart_id', $request->cart_id)->where('user_id', $user->user_id)->firstOrFail();
        $order = Order::create($request->only(['cart_id', 'user_id', 'total_amount', 'status']));
        return redirect()->route('orders.index')->with('success', 'Venta registrada correctamente.');
    }

    // Mostrar detalle de una venta
    public function show($id)
    {
        $tenantId = auth()->user()->tenant_id;
        $order = Order::whereHas('user', function($q) use ($tenantId) {
            $q->where('tenant_id', $tenantId);
        })->with(['user', 'cart.items.variant'])->findOrFail($id);
        return view('orders.show', compact('order'));
    }

    // Mostrar formulario de edición
    public function edit($id)
    {
        $tenantId = auth()->user()->tenant_id;
        $order = Order::whereHas('user', function($q) use ($tenantId) {
            $q->where('tenant_id', $tenantId);
        })->with(['cart.items.variant.product'])->findOrFail($id);
        $users = User::forTenant($tenantId)->get();
        $carts = Cart::whereIn('user_id', $users->pluck('user_id'))->get();
        $variants = \App\Models\ProductVariant::with('product')->get();
        return view('orders.edit', compact('order', 'users', 'carts', 'variants'));
    }

    // Actualizar una venta
    public function update(Request $request, $id)
    {
        $tenantId = auth()->user()->tenant_id;
        $order = Order::whereHas('user', function($q) use ($tenantId) {
            $q->where('tenant_id', $tenantId);
        })->findOrFail($id);
        $request->validate([
            'cart_id' => 'required|exists:Cart,cart_id',
            'user_id' => 'required|exists:User,user_id',
            'status' => 'required',
            'items' => 'required|array',
            'items.*.variant_id' => 'required|exists:ProductVariant,variant_id',
            'items.*.quantity' => 'required|integer|min:1',
        ]);
        // Validar que el user_id y cart_id pertenezcan al tenant
        $user = User::forTenant($tenantId)->findOrFail($request->user_id);
        $cart = Cart::where('cart_id', $request->cart_id)->where('user_id', $user->user_id)->firstOrFail();
        $order->update($request->only(['cart_id', 'user_id', 'status']));
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
        $tenantId = auth()->user()->tenant_id;
        $order = Order::whereHas('user', function($q) use ($tenantId) {
            $q->where('tenant_id', $tenantId);
        })->findOrFail($id);
        $cart = $order->cart;
        \DB::table('payment')->where('order_id', $order->order_id)->delete();
        $order->delete();
        if ($cart) {
            $cart->items()->delete();
            $cart->delete();
        }
        return redirect()->route('orders.index')->with('success', 'Venta eliminada correctamente.');
    }
} 