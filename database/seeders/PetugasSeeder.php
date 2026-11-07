<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class PetugasSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // 1 Akun Admin BPBD Tetap
        User::create([
            'name'     => 'Admin BPBD Bandung',
            'email'    => 'admin@bpbd.bandung.go.id',
            'password' => Hash::make('admin123'),
        ]);

        // 5 Akun Petugas Dummy menggunakan Faker
        for ($i = 0; $i < 5; $i++) {
            User::create([
                'name'     => $faker->name,
                'email'    => $faker->unique()->safeEmail,
                'password' => Hash::make('password123'),
            ]);
        }
    }
}