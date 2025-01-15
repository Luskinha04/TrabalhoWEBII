<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    // Defina a tabela que este modelo irá usar
    protected $table = 'produto';

    // Defina os campos que podem ser preenchidos em massa
    protected $fillable = [
        'nome', 
        'descricao', 
        'preco', 
        'estoque'
    ];

    // Defina os campos que serão convertidos para um tipo específico
    protected $casts = [
        'preco' => 'decimal:2', // Garantir que o preço seja sempre no formato decimal com 2 casas
    ];

    public $timestamps = false;
}
