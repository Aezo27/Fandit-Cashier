<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class data_reseller extends Model
{
    protected $table = 'data_reseller';
    protected $fillable = [
        'id', 'nama_toko', 'nama', 'alamat', 'no_hp', 'foto_profil',
    ];
    public function getFotoProfilAttribute()
    {
        if (! $this->attributes['foto_profil']) {
            return 'avatar5.png';
        }
        return $this->attributes['foto_profil'];
    }
}
