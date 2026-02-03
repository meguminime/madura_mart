<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'kd_barang',
        'nama_barang',
        'jenis_barang',
        'tgl_expired',
        'harga_jual',
        'stok',
        'foto_barang'
    ];

    protected $casts = [
    'tgl_expired' => 'date'
    ];
}