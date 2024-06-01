<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MoneyDonationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('money_donations')->insert([
                'id_donasi' => 1,
                'id_bank' => 1,
                'nama_bank' => 'Mandiri',
                'nama_pemilik' => 'PT. Edu Fund',
                'nomor_rekening' => '13555667',
                'nominal_terkumpul' => 10000,
                'nominal_sisa' => 10000,
        ]);
        DB::table('money_donations')->insert([
                'id_donasi' => 2,
                'id_bank' => 1,
                'nama_bank' => 'Mandiri',
                'nama_pemilik' => 'PT. Edu Fund',
                'nomor_rekening' => '13555667',
                'nominal_terkumpul' => 10000,
                'nominal_sisa' => 10000,
        ]);
    }
}