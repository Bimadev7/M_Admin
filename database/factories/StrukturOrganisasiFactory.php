<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StrukturOrganisasi>
 */
class StrukturOrganisasiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_pejabat' => $this->faker->sentence,
            'jabatan' => $this->faker->word,
            'foto' => 'default-berita.jpg',
            'nip' => $this->faker->word,
            'deskripsi' => $this->faker->paragraphs(3, true),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
