<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;
    protected $table = 'donations';

    protected $fillable = [
        'id_user',
        'id_campaign',
        'pesan',
        'syarat_ketentuan',
        'status',
        'jasa_kirim',
        'nomor_resi',
    ];

    // Definisikan relasi dengan model Campaign
    public function campaign()
    {
        return $this->belongsTo(Campaign::class, 'id_campaign');
    }

    // Definisikan relasi dengan model User
    public function user()
    {
    return $this->belongsTo(User::class, 'id_user');
    }

    // Definisikan relasi dengan model MethodPayment
    public function methodPayment()
    {
        return $this->belongsTo(MethodPayment::class, 'rekening');
    }

    public function donationItems()
    {
        return $this->hasMany(ItemDonation::class, 'id_donasi');
    }

    public function donationMoney()
    {
        return $this->hasMany(MoneyDonation::class, 'id_donasi');
    }
}
