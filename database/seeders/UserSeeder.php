<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'username' => 'johndoe',
            'email' => 'johndoe@example.com',
            'password' => Hash::make('password123'), // Enkripsi password
            'role' => 'admin',
        ]);
    }
}
