<?php

namespace App\Models;

use App\Models\RequestPencairan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TahapPencairan extends Model
{
    use HasFactory;
    protected $table = 'tahap_pencairan';
    protected $fillable = [
            'id',
            'name',
        ];


    public function requestPencairan()
    {
        return $this->hasMany(RequestPencairan::class, 'id_tahap_pencairan');
    }
}