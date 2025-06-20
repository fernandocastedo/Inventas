<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $table = 'CartItem';
    protected $primaryKey = 'cart_item_id';
    protected $fillable = [
        'cart_id',
        'variant_id',
        'quantity',
    ];

    public $timestamps = false;

    public function cart()
    {
        return $this->belongsTo(Cart::class, 'cart_id');
    }

    public function variant()
    {
        return $this->belongsTo(ProductVariant::class, 'variant_id');
    }
} 