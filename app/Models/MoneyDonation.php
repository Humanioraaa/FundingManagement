<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoneyDonation extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_donasi',
        'id_bank',
        'nama_bank',
        'nama_pemilik',
        'nomor_rekening',
        'nominal',
        'status',
    ];

    public function donation()
    {
        return $this->belongsTo(Donation::class, 'id_donasi');
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class, 'id_bank');
    }

    public function requestPencairan()
    {
        return $this->hasMany(RequestPencairan::class, 'id_money_donation');
    }


}