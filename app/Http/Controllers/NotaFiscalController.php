<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\NotasFiscai;
use App\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NotaFiscalController extends Controller
{
    function index()
    {
        $notas = NotasFiscai::where('user_id', '=', Auth::user()->id)->get();
        return view('cadastroNotaFiscal', ['notas' => $notas]);
    }

    function indexN()
    {
        return view('NotaFiscalDetalhe');
    }

    function buscar(Request $request)
    {
        $data = $request->all();
        $codigo = $data['codigo'];
        $nota = NotasFiscai::where('codigo', '=', "$codigo")->get();
        if (count($nota) == 0) {
            return view('NotaFiscalDetalhe', ["NotOk" => "NOTA FISCAL NÃO CADASTRADA"]);
        }
        $produtos = Produto::where('nota_fiscal_id', '=', $nota[0]->id)->with('categoria','codigo')->get();
        if (count($produtos) == 0) {
            return view('NotaFiscalDetalhe', ["NotOk" => "NENHUM PRODUTO ENCONTRADO NESSA NOTA FISCAL"]);
        }

        return view('NotaFiscalDetalhe',["produtos" => $produtos]);
    }

    function cadastrar(Request $request)
    {
        $data = $request->all();
        $codigo = $data["codigo"];
        $notas = NotasFiscai::where('user_id', '=', Auth::user()->id)->get();
        try {
            DB::table('notas_fiscais')->insert(["codigo" => $codigo, "user_id" => Auth::user()->id]);
            $notas = NotasFiscai::where('user_id', '=', Auth::user()->id)->get();
            //Categoria::create(["nome" => $nome, "user_id" => Auth::user()->id]);
        } catch (\Exception $e) {
            return view("cadastroNotaFiscal", ['NotOk' => "NOTA FISCAL JÁ CADASTRADA", 'notas' => $notas]);
        }
        $categorias = Categoria::where('user_id', '=', Auth::user()->id)->get();
        return view("cadastroNotaFiscal", ['Ok' => "NOTA FISCAL SALVA COM SUCESSO", 'notas' => $notas]);
    }
}
