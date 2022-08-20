<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'judul', 'product_id',
    ];
    public function products()
    {
        return $this->belongsTo(Product::class);
    }
}
