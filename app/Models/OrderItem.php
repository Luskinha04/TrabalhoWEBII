<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'produto_id',
        'order_id',
        'quantidade',
        'preco',
    ];

    public function produto()
    {
        return $this->belongsTo(Produto::class, 'produto_id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
