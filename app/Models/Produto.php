<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'category_id',
    ];

    // Relacionamento: um produto pode estar em vários pedidos.
    public function itens()
    {
        return $this->hasMany(OrderItem::class);
    }
}
