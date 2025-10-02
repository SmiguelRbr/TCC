<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CrefRegistros extends Model
{
    // Adicione 'user_id' aqui!
    protected $fillable = [
        'cref_numero',
        'cref_categoria',
        'cref_uf',
        'user_id', // <-- ADICIONAR ESTA LINHA
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}