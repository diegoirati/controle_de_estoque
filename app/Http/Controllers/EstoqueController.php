<?php

namespace App\Http\Controllers;

use App\Produto;
use Illuminate\Support\Facades\Auth;

class EstoqueController extends Controller
{
    public function index()
    {
        $produtos = Produto::where('user_id', '=', Auth::user()->id)->with('categoria')->get();
        return view('controleEstoque', ["produtos" => $produtos]);
    }


}
