<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;

class ClienteSeeder extends Seeder
{
    public function run()
    {
        Cliente::create([
            'name' => 'Cliente Teste 1',
            'email' => 'cliente1@teste.com',
            'phone' => '123456789',
        ]);

        Cliente::create([
            'name' => 'Cliente Teste 2',
            'email' => 'cliente2@teste.com',
            'phone' => '987654321',
        ]);
    }
}
