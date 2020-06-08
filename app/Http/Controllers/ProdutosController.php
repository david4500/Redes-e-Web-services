<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Produto;

class ProdutosController extends Controller
{
    function telaCadastro(){
        return view('cadastro_produto');
    }

    function insercao(Request $request){
        $nome = $request->input('nome');
        $preco = $request->input('preco');

        $dados = [];
        $dados["nome"] = $nome;
        $dados["preco"] = $preco;

        $res = Http::post('http://localhost:8000/api/produtos', $dados);

        dd($res);

    }
}
