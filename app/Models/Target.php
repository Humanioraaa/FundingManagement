<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Target extends Model
{
    use HasFactory;
    protected $table = 'targets';
    protected $fillable = ['id_campaign', 'nama_barang', 'jumlah_barang'];
}
