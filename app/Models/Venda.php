<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    use HasFactory;

    // Desabilitar o uso automático das colunas created_at e updated_at
    public $timestamps = false;

    // A tabela associada ao modelo
    protected $table = 'venda';

    // Atributos que podem ser preenchidos (mass assignment)
    protected $fillable = [
        'usuario_id',
        'produto_id',
        'quantidade',
        'total',
    ];

    // Definir as relações do modelo
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    public function produto()
    {
        return $this->belongsTo(Produto::class, 'produto_id');
    }
}
