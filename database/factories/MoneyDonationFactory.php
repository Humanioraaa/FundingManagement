<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\Donation;
use App\Models\MethodPayment;
use App\Models\MoneyDonation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MoneyDonation>
 */
class MoneyDonationFactory extends Factory
{
    protected $model = MoneyDonation::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_donasi' => Donation::all()->random()->id,
            'id_bank' => MethodPayment::all()->random()->id,
            'nama_bank' => $this->faker->company,
            'nama_pemilik' => $this->faker->name,
            'nomor_rekening' => $this->faker->numberBetween(1000, 9999),
            'status' => $this->faker->randomElement(['verified', 'pending', 'rejected']),
            'nominal' => $this->faker->numberBetween(100000, 99999999),
            'created_at' => $this->faker->dateTimeBetween(Carbon::create(2024, 1, 1), Carbon::create(2024, 12, 31)),
        ];
    }
}