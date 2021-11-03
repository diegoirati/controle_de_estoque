<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = [
        'nome',
        'telefone'
    ];


    public function pedido_produtos_itens()
    {
        return $this->hasMany('App\PedidoProduto');
    }

}
