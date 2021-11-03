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
        return view('cadastroProduto', [
            "categorias" => Categoria::where('user_id', '=', Auth::user()->id)->get()
        ]);
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
        $query1 = Categoria::where('nome', '=', "$categoria")->get();

        $categoria_id = $query1[0]->id;
        $nome = $data["nome"];
        $qtd = $data["quantidade"];

        $name = null;
        if ($request->imagem) {
            //$request->file('imagem')->move(public_path("/imagens"), str);
            $file = request()->file('imagem');
            $name = $file->store('/imagens', ['disk' => 'public']);
        }

        try {
            DB::table('produtos')->insert([
                "categoria_id" => $categoria_id,
                "nome" => $nome,
                "quantidade" => $qtd,
                "user_id" => Auth::user()->id,
                "descricao" => $request->descricao,
                "preco" => $request->preco,
                'image_name' => $name,
            ]);
        } catch (\Exception $e) {
            return view("cadastroProduto", ['NotOk' => $e->getMessage(), "categorias" => Categoria::where('user_id', '=', Auth::user()->id)->get()]);
        }

        return view("cadastroProduto", ['Ok' => "PRODUTO CADASTRADO COM SUCESSO", "categorias" => Categoria::where('user_id', '=', Auth::user()->id)->get()]);
    }

    public function excluir(Request $request)
    {
        $produtoIds = $request->all();

        unset($produtoIds['_token']);

        foreach ($produtoIds as $key => $value) {
            DB::table('produtos')->where('id', '=', $key)->delete();
        }

        $produtos = $produtos = Produto::where('user_id', '=', Auth::user()->id)->with('categoria')->get();
        return view('excluirProduto', ["produtos" => $produtos, "Ok" => "PRODUTO EXCLUIDO COM SUCESSO"]);
    }
}

