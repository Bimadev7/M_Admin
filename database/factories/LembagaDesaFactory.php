<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\LembagaDesa;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LembagaDesa>
 */
class LembagaDesaFactory extends Factory
{
    protected $model = LembagaDesa::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image' => 'default-berita.jpg',
            'nama_lembaga' => $this->faker->sentence,
            'alamat' => $this->faker->address,
            'deskripsi_profil' => $this->faker->paragraphs(3, true),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
