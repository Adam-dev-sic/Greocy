<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    protected $fillable = [
        'user_id', // <— add this
        // add any other columns you’ll mass assign
        'shopping_cart_id',
    ];
  
     public function items()
    {
        return $this->hasMany(CartItem::class);
    }
}
