<?php

namespace App\Models;

use App\Models\MethodPayment;
use App\Models\MoneyDonation;
use App\Models\TahapPencairan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RequestPencairan extends Model
{
    use HasFactory;
    protected $table = 'request_pencairan';
    protected $fillable = [
        'id_money_donation',
        'nominal',
        'status',
        'nominal_terkumpul',
        'nominal_sisa',
        'id_tahap_pencairan',
        'id_method_payment',
        'nama_pemilik',
        'nomor_rekening',
        'pendukung'
    ];

    // Definisikan relasi dengan model MoneyDonation
    public function moneyDonation()
    {
        return $this->belongsTo(MoneyDonation::class, 'id_money_donation');
    }
    public function TahapPencairan()
    {
        return $this->belongsTo(TahapPencairan::class, 'id_tahap_pencairan');
    }
    public function methodPayment()
    {
        return $this->belongsTo(MethodPayment::class, 'id_method_payment');
    }
}
