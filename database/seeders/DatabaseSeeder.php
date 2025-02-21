<?php

namespace Database\Seeders;

use App\Models\Setting;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin123@sipenpas.co.id',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);

        Setting::create([
            'nama_lomba' => 'Testing Lomba',
            'tanggal_mulai' => '2025-12-20',
            'lokasi' => 'Kantor Bupati',
            'deskripsi' => 'Lomba Testing',
            'logo' => 'logo.png',
        ]);
    }
}
