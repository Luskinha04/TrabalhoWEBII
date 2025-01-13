<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produto;

class ProdutoSeeder extends Seeder
{
    public function run()
    {
        Produto::create([
            'name' => 'Coxinha',
            'description' => 'Deliciosa coxinha de frango com catupiry.',
            'price' => 5.00,
            'stock' => 50,
            'category_id' => 1, // ID de uma categoria já existente
        ]);

        Produto::create([
            'name' => 'Pão de Queijo',
            'description' => 'Pão de queijo artesanal, crocante por fora e macio por dentro.',
            'price' => 2.50,
            'stock' => 100,
            'category_id' => 2, // ID de uma categoria já existente
        ]);

        Produto::create([
            'name' => 'Refrigerante 2L',
            'description' => 'Refrigerante sabor cola, ideal para festas.',
            'price' => 7.00,
            'stock' => 30,
            'category_id' => 1, // ID de uma categoria já existente
        ]);
    }
}
