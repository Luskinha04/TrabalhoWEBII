<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles; // Importe o trait

class User extends Authenticatable
{
    use Notifiable, HasRoles; // Use o trait

    // Campos permitidos para preenchimento em massa
    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // Inclua o campo 'role'
    ];
}
