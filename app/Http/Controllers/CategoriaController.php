<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoriaController extends Controller
{
    function index()
    {
        $categorias = Categoria::where('user_id', '=', Auth::user()->id)->get();
        return view('cadastroCategoria', ['categorias' => $categorias]);
    }

    function cadastrar(Request $request)
    {
        $data = $request->all();
        $nome = $data["nome"];
        $categorias = Categoria::where('user_id', '=', Auth::user()->id)->get();
        try {
            DB::table('categorias')->insert(["nome" => $nome, "user_id" => Auth::user()->id]);
            //Categoria::create(["nome" => $nome, "user_id" => Auth::user()->id]);
        } catch (\Exception $e) {
            return view("cadastroCategoria", ['NotOk' => "CATEGORIA JÁ CADASTRADA", 'categorias' => $categorias]);
        }
        $categorias = Categoria::where('user_id', '=', Auth::user()->id)->get();
        return view("cadastroCategoria", ['Ok' => "CATEGORIA SALVA COM SUCESSO", 'categorias' => $categorias]);
    }
}
