<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    //
    protected $fillable = [
        'product_id',
        'shopping_cart_id',
        'quantity',
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
