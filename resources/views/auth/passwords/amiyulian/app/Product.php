<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'id', 'nama_barang', 'harga', 'harga_diskon', 'berat', 'stok', 'ket1', 'ket2', 'category_id', 'gambar_utama', 'gambar2', 'gambar3', 'gambar4', 'views', 'link',
    ];
    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
    public function tags()
    {
        return $this->hasMany(Tag::class);
    }
    public function categories()
    {
        return $this->belongsTo(Category::class);
    }
    public function sizes()
    {
        return $this->hasOne(Size::class);
    }
    public function colors()
    {
        return $this->belongsToMany(Color::class);
    }
}
