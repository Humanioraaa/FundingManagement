<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MethodPayment;

class MethodPaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $methodpayments = [
            [
                'metode_pembayaran' => 'Bank Mandiri',
                'nomor_rekening' => '009998877765',
                'nama_pemilik' => 'PT. Edu Fund',
            ],
            [
                'metode_pembayaran' => 'Bank BCA',
                'nomor_rekening' => '13555667',
                'nama_pemilik' => 'PT. Edu Fund',
            ],
            [
                'metode_pembayaran' => 'Bank BNI',
                'nomor_rekening' => '1145666778',
                'nama_pemilik' => 'PT. Edu Fund',
            ],
            [
                'metode_pembayaran' => 'DANA',
                'nomor_rekening' => '081236367878',
                'nama_pemilik' => 'PT. Edu Fund',
            ],
            [
                'metode_pembayaran' => 'GoPay',
                'nomor_rekening' => '081236367878',
                'nama_pemilik' => 'PT. Edu Fund',
            ]
            ];

            foreach ($methodpayments as $methodpayment) {
                MethodPayment::create($methodpayment);
            }


    }
}
