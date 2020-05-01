<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cliente/cadastro','ClienteController@telaCadastro')-> name('tela_cadastro');
Route::post('/cliente/cadastro_passo1', 'ClienteController@salvaPasso1')->name('passo1');
Route::post('/cliente/cadastro_final', 'ClienteController@salvaFinal')->name('cadastro_final');