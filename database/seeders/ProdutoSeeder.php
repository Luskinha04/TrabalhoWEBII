<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produto;

class ProdutoSeeder extends Seeder
{
    public function run()
    {
        Produto::create([
            'name' => 'Produto 2',
            'description' => 'Descrição para teste',
            'price' => 15.00,
            'stock' => 30,
            'category_id' => 1,
        ]);

        Produto::create([
            'name' => 'Produto 3',
            'description' => 'Outro produto teste',
            'price' => 25.00,
            'stock' => 50,
            'category_id' => 1,
        ]);
    }
}

