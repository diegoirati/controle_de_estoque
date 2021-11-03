<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Pedido;
use App\Produto;
use App\PedidoProduto;

class CarrinhoController extends Controller
{

    public function index()
    {
        $pedidos = Pedido::where([
            'quantidade'  => '',
            ])->get();

        return view('carrinho.index', compact('pedidos'));
    }

    public function adicionar()
    {
       
    }

}
