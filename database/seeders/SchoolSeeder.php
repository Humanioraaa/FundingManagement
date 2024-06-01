<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('schools')->insert([
            'id' => 2,
            'nama_sekolah' => 'SMA 1',
            'alamat_sekolah' => 'Jakarta',
            'no_telepon_sekolah' => '081222222',
            'email_sekolah' => 'sekolah@gmail.com',

        ]);
    }
}
