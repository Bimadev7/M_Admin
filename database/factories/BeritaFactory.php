<?php

namespace Database\Factories;

use App\Models\Berita;
use App\Models\KategoriBerita;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Berita>
 */
class BeritaFactory extends Factory
{
    protected $model = Berita::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'judul' => $this->faker->sentence,
            'image' => 'default-berita.jpg', // assuming you have a default image or you can generate fake images
            'caption_capture' => $this->faker->sentence,
            'deskripsi_singkat' => $this->faker->paragraph,
            'deskripsi' => $this->faker->paragraphs(3, true),
            'penulis' => $this->faker->name,
            'kategori_id' => KategoriBerita::inRandomOrder()->first()->id, // assuming you have a factory for KategoriBerita
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
