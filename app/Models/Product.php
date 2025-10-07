<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
        "name",
        "price",
        "image",
        "admin_id",
        "quantity",
        'tag'
    ];
}
