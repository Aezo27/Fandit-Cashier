<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    public $fillable = [
        'product_id', 's', 'm', 'l', 'xl', 'xxl',
    ];
    public function products()
    {
        return $this->belongTo(Product::class);
    }
    public function namaTable()
    {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }
}
