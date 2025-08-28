<?php

// app/Models/CrnRegistro.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CrnRegistro extends Model
{
    protected $table = 'crn_registros';

    protected $fillable = [
        'numero',      // número do CRN
        'regiao',      // código do CRN, ex: CRN-3
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

