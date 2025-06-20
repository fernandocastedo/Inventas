<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'Product';
    protected $primaryKey = 'product_id';
    protected $fillable = [
        'tenant_id',
        'name',
        'description',
        'category',
        'status',
    ];

    public function variants()
    {
        return $this->hasMany(ProductVariant::class, 'product_id');
    }
} 