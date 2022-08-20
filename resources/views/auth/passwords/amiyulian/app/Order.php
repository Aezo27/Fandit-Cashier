<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'id', 'nama_penerima', 'nama_pengirim', 'provinsi', 'kabupaten', 'kecamatan', 'kode_pos', 'email', 'no_hp','bukti_tf', 'alamat_lengkap', 'status', 'pesan_tambahan', 'diskon', 'no_resi', 'total', 'kurir', 'ongkir',
    ];
    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('jumlah');
    }
}
