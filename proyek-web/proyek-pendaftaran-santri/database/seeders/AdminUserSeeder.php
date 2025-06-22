<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder {
    public function run(): void {
        User::create([
            'name' => 'Admin Pesantren',
            'email' => 'admin@pesantren.com',
            'password' => Hash::make('password'), // Ganti password ini
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);
    }
}