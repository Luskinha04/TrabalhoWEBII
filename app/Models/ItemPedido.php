<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemPedido extends Model
{
    use HasFactory;

    protected $table = 'item_pedido'; // Nome correto da tabela no banco

    protected $fillable = [
        'order_id',
        'produto_id',
        'quantidade',
        'preco_unitario',
    ];

    /**
     * Relacionamento com Pedido
     */
    public function pedido()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    /**
     * Relacionamento com Produto
     */
    public function produto()
    {
        return $this->belongsTo(Produto::class, 'produto_id');
    }
}
