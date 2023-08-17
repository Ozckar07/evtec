<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{

    protected $fillable = ['nombre', 'descripcion', 'precio'];

    protected $casts = [
        'precio' => 'decimal:2', 
    ];
}