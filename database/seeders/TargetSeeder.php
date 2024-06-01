<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Target;

class TargetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $targets = [
            // [
            //     'id_campaign' => 1,
            //     'nama_barang' => 'Buku Bacaan',
            //     'jumlah_barang' => 50,
            // ],
            // [
            //     'id_campaign' => 1,
            //     'nama_barang' => 'Uang',
            //     'jumlah_barang' => 5000000,
            // ],
            [
                'id_campaign' => 2,
                'nama_barang' => 'Papan Tulis',
                'jumlah_barang' => 2,
            ],
            [
                'id_campaign' => 2,
                'nama_barang' => 'Spidol',
                'jumlah_barang' => 24,
            ],
            // [
            //     'id_campaign' => 2,
            //     'nama_barang' => 'Uang',
            //     'jumlah_barang' => 2000000,
            // ],
            // [
            //     'id_campaign' => 3,
            //     'nama_barang' => 'Uang',
            //     'jumlah_barang' => 200000000,
            // ],
            // [
            //     'id_campaign' => 4,
            //     'nama_barang' => 'Uang',
            //     'jumlah_barang' => 10000000,
            // ],
            // [
            //     'id_campaign' => 5,
            //     'nama_barang' => 'Uang',
            //     'jumlah_barang' => 10000000,
            // ],
            // [
            //     'id_campaign' => 5,
            //     'nama_barang' => 'Meja',
            //     'jumlah_barang' => 20,
            // ],
            // [
            //     'id_campaign' => 5,
            //     'nama_barang' => 'Kursi',
            //     'jumlah_barang' => 20,
            // ]
        ];

        foreach ($targets as $target) {
            Target::create($target);
        }
    }
}
