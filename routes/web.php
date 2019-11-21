<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/home', function () {
    return view('welcome');
})->name('home');

Auth::routes();

Route::get('/logout', 'Auth\loginController@logout');

Route::get('/cadastrarcategoria', 'CategoriaController@index')->middleware('auth')->name('categoria.index');
Route::post('/cadastrarcategoria', 'CategoriaController@cadastrar')->middleware('auth')->name('categoria.salvar');

Route::get('/cadastrarnotafiscal', 'NotaFiscalController@index')->middleware('auth')->name('nota.index');
Route::get('/visualizarnotas', 'NotaFiscalController@indexN')->middleware('auth')->name('nota.busca');
Route::post('/buscarnota', 'NotaFiscalController@buscar')->middleware('auth')->name('nota.buscar');
Route::post('/cadastrarnotafiscal', 'NotaFiscalController@cadastrar')->middleware('auth')->name('nota.salvar');

Route::get('/cadastrarproduto', 'ProdutoController@index')->middleware('auth')->name('produto.index');
Route::get('/deletarproduto', 'ProdutoController@indexExcluir')->middleware('auth')->name('produto.indexExcluir');
Route::get('/atualizarproduto', 'ProdutoController@indexAtulizar')->middleware('auth')->name('produto.indexAtualizar');

Route::post('/cadastrarproduto', 'ProdutoController@cadastrar')->middleware('auth')->name('produto.salvar');
Route::post('/deletarproduto', 'ProdutoController@excluir')->middleware('auth')->name('produto.excluir');
Route::post('/atualizarproduto', 'ProdutoController@atualizar')->middleware('auth')->name('produto.atualizar');

Route::get('/controleestoque', 'EstoqueController@index')->middleware('auth')->name('estoque.index');;
