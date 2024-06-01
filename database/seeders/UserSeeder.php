<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
                'id' => 1,
                'nama' => 'User 1',
                'email' => 'user@email.com',
                'password' => 'password',
                'phone' => '0812222',
                'tipe_user' => 'siswa',
        ]);

    }
}
