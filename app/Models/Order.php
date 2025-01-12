<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['cliente_id', 'total'];

    // Relacionamento com os Itens do Pedido
    public function items()
    {
        return $this->hasMany(ItemPedido::class, 'order_id');
    }

    // Relacionamento com Cliente (adicionar futuramente)
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }
}
