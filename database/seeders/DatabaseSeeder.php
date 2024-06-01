<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Campaign;
use App\Models\ItemDonation;
use App\Models\MoneyDonation;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\SchoolSeeder;
use Database\Seeders\CampaignSeeder;
use Database\Seeders\DonationSeeder;
use Database\Seeders\MethodPaymentSeeder;
use Database\Seeders\TahapPencairanSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // $this->call([
        //     UserSeeder::class,
        //     SchoolSeeder::class,
        //     CampaignSeeder::class,
        //     DonationSeeder::class,
        //     MethodPaymentSeeder::class,
        //     MoneySeeder::class,
        // ]);

        $this->call([
        UserSeeder::class,
        SchoolSeeder::class,
        CampaignSeeder::class,
        MethodPaymentSeeder::class,
        DonationSeeder::class,
        TahapPencairanSeeder::class,
        ]);

        MoneyDonation::factory()->count(10)->create();
        ItemDonation::factory(10)->create();
        Campaign::factory(10)->create();
        User::factory(10)->create();

    }
}
