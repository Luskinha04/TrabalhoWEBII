<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;

class Order extends Model
{
    use HasFactory;

    /**
     * Os atributos que podem ser atribuídos em massa.
     *
     * @var array
     */
    protected $fillable = [
        'cliente_id',
        'total',
    ];

    /**
     * Relacionamento: um pedido pertence a um cliente.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    /**
     * Relacionamento: um pedido tem muitos itens.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function itens()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }    
}    