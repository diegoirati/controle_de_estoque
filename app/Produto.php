<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
        'id', 'categoria_id', 'nome', 'quantidade',
    ];

    function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id', 'id');
    }

    function codigo()
    {
        return $this->belongsTo(NotasFiscai::class, 'nota_fiscal_id', 'id');
    }
}
