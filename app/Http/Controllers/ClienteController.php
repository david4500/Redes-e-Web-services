<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Cliente;

class ClienteController extends Controller
{
    function telaCadastro(){
        return view("cadastro_cliente");
    }

    function salvaPasso1(Request $req){
        $nome = $req->input('nome');
        $cep = $req->input('cep');
        
        $url = "http://viacep.com.br/ws/". $cep . "/json/";
        $resposta = Http::get($url);
        $r = $resposta->json();

        if($resposta->status() == 400 or array_key_exists("erro", $r)){ // deu erro
            return redirect()->route('tela_cadastro');
        }else if($resposta->ok() == 200){ // retornou statuscode 200 'ok'
            

            $vetor = [
                "nome" => $nome,
                "cep" => $cep,
                "logradouro" => $r["logradouro"],
                "complemento" => $r["complemento"],
                "bairro" => $r["bairro"],
                "cidade" => $r["localidade"],
                "estado" => $r["uf"]

                
            ];

            return view('cadastro_cliente_passo2', $vetor);
        }
    }
    function salvaFinal(Request $req){
         $nome = $req->input('nome');
        $cep = $req->input('cep');
        $logradouro = $req->input('logradouro');
        $complemento = $req->input('complemento');
        $bairro = $req->input('bairro');
        $cidade = $req->input('cidade');
        $estado = $req->input('estado');

        $cliente = new Cliente();
        $cliente->nome = $nome;
        $cliente->cep = $cep;
        $cliente->logradouro = $logradouro;
        $cliente->complemento = $complemento;
        $cliente->bairro = $bairro;
        $cliente->cidade = $cidade;
        $cliente->estado = $estado;

        $cliente->save();

        return redirect()->route('tela_cadastro');

    }
}


