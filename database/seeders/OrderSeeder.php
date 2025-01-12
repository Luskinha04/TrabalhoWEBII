<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;

class OrderSeeder extends Seeder
{
    public function run()
    {
        Order::create([
            'cliente_id' => 1,
            'total' => 100.50,
        ]);

        Order::create([
            'cliente_id' => 2,
            'total' => 50.00,
        ]);
    }
}
