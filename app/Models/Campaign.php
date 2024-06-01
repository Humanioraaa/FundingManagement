<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;
    protected $table = 'campaigns';
    protected $fillable = [
                        'id_sekolah',
                        'nama_campaign',
                        'deskripsi_campaign',
                        'status',
                        'catatan_campaign',
                        'tanggal_dibuat',
                        'tanggal_selesai',
                        'foto'];

    public function school()
    {
        return $this->belongsTo(School::class, 'id_sekolah');
    }

    public function targets()
    {
        return $this->hasMany(Target::class, 'id_campaign');
    }

    public function donations()
    {
        return $this->hasMany(Donation::class, 'id_campaign');
    }
}

