<?php

namespace Database\Factories;

use App\Models\pengumuman;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pengumuman>
 */
class PengumumanFactory extends Factory
{
    protected $model = pengumuman::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'judul' => $this->faker->sentence,
            'image' => 'default-berita.jpg',
            'caption_capture' => $this->faker->sentence,
            'deskripsi_singkat' => $this->faker->paragraph,
            'deskripsi' => $this->faker->paragraphs(3, true),
            'penulis' => $this->faker->name,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
