<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    public function penjualan()
    {
      return $this->belongsToMany(Penjualan::class);
    }
    public function tag()
    {
      return $this->belongsToMany(Tag::class);
    }
}
