<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\school;
use App\Models\Campaign;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Campaign>
 */
class CampaignFactory extends Factory
{

    protected $model = Campaign::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_sekolah' => school::all()->random()->id,
            'nama_campaign' => $this->faker->sentence,
            'deskripsi_campaign' => $this->faker->paragraph,
            'jenis_donasi' => $this->faker->randomElement(['uang', 'barang']),
            'status' => $this->faker->randomElement(['berlangsung', 'pending', 'rejected']),
            'catatan_campaign' => $this->faker->optional()->paragraph,
            'tanggal_selesai' => $this->faker->dateTimeBetween(Carbon::create(2024, 1, 1), Carbon::create(2024, 12, 31)),

            // 'jumlah' => $this->faker->numberBetween(1, 3),
            'created_at' => $this->faker->dateTimeBetween(Carbon::create(2024, 1, 1), Carbon::create(2024, 12, 31)),
        ];
    }
}
