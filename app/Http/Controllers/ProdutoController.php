<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\NotasFiscai;
use App\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProdutoController extends Controller
{
    function index()
    {
        return view('cadastroProduto', ["categorias" => Categoria::where('user_id', '=', Auth::user()->id)->get(), "notas" => NotasFiscai::where('user_id', '=', Auth::user()->id)->get()]);
    }

    function indexExcluir()
    {
        $produtos = Produto::where('user_id', '=', Auth::user()->id)->with('categoria')->get();
        return view('excluirProduto', ["produtos" => $produtos]);
    }

    function indexAtulizar()
    {
        $produtos = Produto::where('user_id', '=', Auth::user()->id)->with('categoria')->get();
        return view('atualizarProduto', ["produtos" => $produtos]);
    }

    function cadastrar(Request $request)
    {
        $data = $request->all();
        $categoria = $data["categoria"];
        $codigo = $data["codigo"];
        $query1 = Categoria::where('nome', '=', "$categoria")->get();
        $query2 = NotasFiscai::where('codigo', '=', "$codigo")->get();

        $categoria_id = $query1[0]->id;
        $nota_id = $query2[0]->id;
        $nome = $data["nome"];
        $qtd = $data["quantidade"];

        try {
            DB::table('produtos')->insert(["categoria_id" => $categoria_id, "nota_fiscal_id" => $nota_id, "nome" => $nome, "quantidade" => $qtd, "user_id" => Auth::user()->id]);
        } catch (\Exception $e) {
            return view("cadastroProduto", ['NotOk' => "ERRO DESCONHECIDO", "categorias" => Categoria::where('user_id', '=', Auth::user()->id)->get(), "notas" => NotasFiscai::where('user_id', '=', Auth::user()->id)->get()]);
        }

        return view("cadastroProduto", ['Ok' => "PRODUTO CADASTRADO COM SUCESSO", "categorias" => Categoria::where('user_id', '=', Auth::user()->id)->get(), "notas" => NotasFiscai::where('user_id', '=', Auth::user()->id)->get()]);
    }

    public function excluir(Request $request)
    {
        $produtoIds = $request->all();

        foreach ($produtoIds as $key => $value) {
            DB::table('produtos')->where('id', '=', $key)->delete();
        }

        $produtos = $produtos = Produto::where('user_id', '=', Auth::user()->id)->with('categoria')->get();
        return view('excluirProduto', ["produtos" => $produtos, "Ok" => "PRODUTO EXCLUIDO COM SUCESSO"]);
    }

    public function atualizar(Request $request)
    {
        $data = $request->all();
        $produtos = Produto::where('user_id', '=', Auth::user()->id)->with('categoria')->get();
        $id = (integer)$data["id"];
        $valor = (integer)$data["valor"];

        try {
            if (Produto::where('id', '=', $id)
                ->where('user_id', '=', Auth::user()->id)
                ->update(['quantidade' => $valor]) == 0) {
                return view('atualizarProduto', ["produtos" => $produtos, "NotOk" => "ERRO, ELEMENTO NÃO CADASTRADO"]);
            }
        } catch (\Exception $e) {
            return view('atualizarProduto', ["produtos" => $produtos, "NotOk" => "ERRO"]);
        }

        $produtos = Produto::where('user_id', '=', Auth::user()->id)->with('categoria')->get();
        return view('atualizarProduto', ["produtos" => $produtos, "Ok" => "ATUALIZADO COM SUCESSO"]);
    }
}

