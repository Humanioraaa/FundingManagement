<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\Donation;
use App\Models\ItemDonation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ItemDonation>
 */
class ItemDonationFactory extends Factory
{

    protected $model = ItemDonation::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
     public function definition(): array
    {
        return [
            'id_donasi' => Donation::all()->random()->id,
            'nama_barang' => $this->faker->sentence,
            'jumlah_barang' => $this->faker->numberBetween(10, 999),
            'status' => $this->faker->randomElement(['dikirim', 'diterima']),
            'created_at' => $this->faker->dateTimeBetween(Carbon::create(2024, 1, 1), Carbon::create(2024, 12, 31)),
        ];
    }
}