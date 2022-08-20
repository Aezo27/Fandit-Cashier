<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Text_Banner extends Model
{
    protected $table = 'text_banner';
    protected $fillable = [
        'judul', 'isi',
    ];
}
