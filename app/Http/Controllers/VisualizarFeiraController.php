<?php

namespace App\Http\Controllers;

use App\Produto;
use App\User;

class VisualizarFeiraController
{
    public function indexGuarapuava()
    {
        $user = User::query()->where('cidade', 'guarapuava')->first();
        $produtos = Produto::where('user_id', '=', $user->id)->with('categoria')->get();
        $cidade = "Guarapuava - Paraná";

        return view('feira', compact('produtos', 'cidade'));
    }

    public function indexIrati()
    {
        $user = User::query()->where('cidade', 'irati')->first();
        $produtos = Produto::where('user_id', '=', $user->id)->with('categoria')->get();
        $cidade = "Irati - Paraná";

        return view('feira', compact('produtos', 'cidade'));
    }
}
