<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    // Nome da tabela no banco de dados
    protected $table = 'admin';

    // Chave primária
    protected $primaryKey = 'id';

    // Campos permitidos para atribuição em massa
    protected $fillable = [
        'usuario_id',
        'nivel_acesso',
    ];

    // Relacionamento com o modelo Usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id', 'id');
    }
}
