<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemDonation extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_donasi',
        'nama_barang',
        'jumlah_barang',
        'status,'
    ];

    public function donation()
    {
        return $this->belongsTo(Donation::class, 'id_donasi');
    }


}