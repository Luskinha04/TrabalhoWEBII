<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'UserA',
            'email' => 'usera@example.com',
            'password' => Hash::make('usera'),
        ]);
        \App\Models\User::factory()->create([
            'name' => 'UserB',
            'email' => 'userb@example.com',
            'password' => Hash::make('userb'),
        ]);
        \App\Models\User::factory()->create([
            'name' => '1',
            'email' => '1',
            'password' => Hash::make('1'),
        ]);
    }
}
