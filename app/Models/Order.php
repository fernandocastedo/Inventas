<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'Order';
    protected $primaryKey = 'order_id';
    protected $fillable = [
        'cart_id',
        'user_id',
        'total_amount',
        'status',
    ];

    public function cart()
    {
        return $this->belongsTo(Cart::class, 'cart_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Acceso rápido a los items de la venta
    public function items()
    {
        return $this->cart ? $this->cart->items() : collect();
    }
} 