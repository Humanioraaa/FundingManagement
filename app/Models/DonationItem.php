<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonationItem extends Model
{
    use HasFactory;
    protected $table = 'donation_items';
    protected $fillable = ['id_donasi', 'nama_barang', 'jumlah_barang'];
}
