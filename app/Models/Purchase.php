<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = [
        'no_nota',
        'tgl_nota',
        'id_distributor',
        'total_bayar',
    ];

    protected $casts = [
        'tgl_nota' => 'date',
    ];

    public function distributor()
    {
        return $this->belongsTo(Distributor::class, 'id_distributor');
    }

    public function purchaseDetails()
    {
        return $this->hasMany(Purchase_Detail::class, 'id_pembelian');
    }
}
