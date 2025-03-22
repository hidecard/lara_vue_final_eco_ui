<?php

namespace Database\Seeders;

use App\Models\Administrator;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'firstName' => fake()->firstName(),
            'lastName' => fake()->lastName(),
            'email' => 'admin@admin',
            'phone' => fake()->phoneNumber(),
            'password' => Hash::make('password'),
        ]);

        Administrator::create([
            'name' => fake()->name(),
            'email' => 'admin@admin',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        for ($i = 0; $i < 50; $i++) {
            User::create([
                'firstName' => fake()->firstName(),
                'lastName' => fake()->lastName(),
                'email' => fake()->email(),
                'phone' => fake()->phoneNumber(),
                'password' => Hash::make('password'),
            ]);
        }
    }
}
