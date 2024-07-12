<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('slider')->insert([
            ['slider1' => 'desa1.jpg'],
            ['slider2' => 'desa2.jpg'],
            ['slider3' => 'desa3.jpg'],
        ]);
    }
}
