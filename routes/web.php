<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/cadastrarproduto', 'ProdutoController@index')->middleware('auth')->name('produto.index');
Route::get('/deletarproduto', 'ProdutoController@indexExcluir')->middleware('auth')->name('produto.indexExcluir');
Route::get('/atualizarproduto', 'ProdutoController@indexAtulizar')->middleware('auth')->name('produto.indexAtualizar');

Route::post('/cadastrarproduto', 'ProdutoController@cadastrar')->middleware('auth')->name('produto.salvar');
Route::post('/deletarproduto', 'ProdutoController@excluir')->middleware('auth')->name('produto.excluir');
Route::post('/atualizarproduto', 'ProdutoController@atualizar')->middleware('auth')->name('produto.atualizar');

Route::get('/controleestoque', 'EstoqueController@index')->middleware('auth')->name('estoque.index');;

Route::get('/guarapuava', 'VisualizarFeiraController@indexGuarapuava')->name('feira.guarapuava');
Route::get('/irati', 'VisualizarFeiraController@indexIrati')->name('feira.irati');
