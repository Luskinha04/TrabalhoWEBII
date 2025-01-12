<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ItemPedido;

class ItemPedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ItemPedido::create([
            'order_id' => 1, // Certifique-se de que existe um pedido com ID 1
            'produto_id' => 1, // Certifique-se de que existe um produto com ID 1
            'quantidade' => 2,
            'preco_unitario' => 19.99,
        ]);
    }
}
