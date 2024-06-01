<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TahapPencairanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tahap_pencairan')->insert([
                'id' => 1,
                'name' => 'Tahap 1',
        ]);
         DB::table('tahap_pencairan')->insert([
                'id' => 2,
                'name' => 'Tahap 2',
        ]);
         DB::table('tahap_pencairan')->insert([
                'id' => 3,
                'name' => 'Tahap 3',
        ]);



    }
}