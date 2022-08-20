<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $fillable = [
        'nama_bank', 'no_rek', 'barcode', 'an',
    ];
}
