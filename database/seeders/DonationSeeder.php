<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DonationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('donations')->insert([
                'id'=>1,
                'id_user' => 1,
                'id_campaign' => 1,
                'status' => 'diterima'
        ]);
        DB::table('donations')->insert([
                'id'=>2,
                'id_user' => 1,
                'id_campaign' => 2,
                'status' => 'diterima'
        ]);
    }
}
