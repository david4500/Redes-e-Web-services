<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Produto;

class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Produto::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = $request->getContent();
        $dados_php = json_decode($dados, 1);

        $produto= new Produto();
        $produto->preco = $dados_php["preco"];
        $produto->nome = $dados_php["nome"];
        $produto->save();

        return $produto;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Produto::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dados = $request->getContent();
        $dados_php = json_decode($dados, 1);

        $produto = Produto::findOrFail($id);
        $produto->preco = $dados_php["preco"];
        $produto->nome = $dados_php["nome"];
        $produto->save();

        return $produto;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = Produto::findOrFail($id);
        $produto->delete();
    }
}
