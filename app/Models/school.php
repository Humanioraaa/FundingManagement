<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class school extends Model
{
    use HasFactory;
    protected $table = 'schools';
    protected $fillable = [
        'logo_sekolah',
        'nama_sekolah',
        'alamat_sekolah',
        'no_telepon_sekolah',
        'email_sekolah',
        'password',
        'nama_pendaftar',
        'no_hp_pendaftar',
        'email_pendaftar',
        'identitas_pendaftar',
        'bukti_id_pendaftar',
        'status'
    ];
}
