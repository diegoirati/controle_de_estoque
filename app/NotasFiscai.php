<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotasFiscai extends Model
{

    protected $fillable = [
        'id',
        'codigo',
        'user_id'
    ];

    public function produtos()
    {
        return $this->hasMany(Produto::class);
    }
}

