<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Admin
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Perawat
        User::create([
            'name' => 'Perawat User',
            'email' => 'perawat@example.com',
            'password' => Hash::make('password'),
            'role' => 'perawat',
        ]);
    }
}
