<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Berita;
use App\Models\pengumuman;
use App\Models\LembagaDesa;
use App\Models\KepengurusanLembaga;
use App\Models\StrukturOrganisasi;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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

        // Berita::factory(5)->create();

        // pengumuman::factory(5)->create();

        //LembagaDesa::factory(3)->create();
        // KepengurusanLembaga::factory(15)->create();
        // StrukturOrganisasi::factory(2)->create();



        $this->call([
            // KategoriBeritaSeeder::class,
            SliderSeeder::class,
        ]);
    }
}
