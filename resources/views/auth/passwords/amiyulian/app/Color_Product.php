<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color_Product extends Model
{
    protected $table = 'color_product';
    protected $fillable = [
        'color_id', 'product_id',
    ];
}
