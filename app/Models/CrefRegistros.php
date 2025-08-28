<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CrefRegistros extends Model
{
    protected $fillable = [
        'cref_numero',
        'cref_categoria',
        'cref_uf',
    ];

    public function user()
{
    return $this->belongsTo(User::class);
}

}
