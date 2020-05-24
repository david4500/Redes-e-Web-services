<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cliente;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Cliente::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
        {
        "nome": "Claudio",
        "cep": "89500016",
        "logradouro": "Avenida Barao do Rio Pato",
        "complemento": "",
        "bairro": "Centro",
        "cidade": "Cacador",
        "estado": "SC",
        }*/

        

        $dados = $request->getContent();
        $dados_php = json_decode($dados, 1);

        $cliente = new Cliente();
        $cliente->nome = $dados_php["nome"];
        $cliente->cep = $dados_php["cep"];
        $cliente->logradouro = $dados_php["logradouro"];
        $cliente->complemento = $dados_php["complemento"];
        $cliente->bairro = $dados_php["bairro"];
        $cliente->cidade = $dados_php["cidade"];
        $cliente->estado = $dados_php["estado"];

        $cliente->save();
        
        return $cliente;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Cliente::findOrFail($id);
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

        $cliente = Cliente::findOrFail($id); 

        $cliente->nome = (array_key_exists("nome", $dados_php) ? $dados_php["nome"] : $cliente->nome);

        $cliente->cep = (array_key_exists("cep", $dados_php) ? $dados_php["cep"] : $cliente->cep);

        $cliente->logradouro = (array_key_exists("logradouro", $dados_php) ? $dados_php["logradouro"] : $cliente->logradouro);

        $cliente->complemento = (array_key_exists("complemento", $dados_php) ? $dados_php["complemento"] : $cliente->complemento);

        $cliente->bairro = (array_key_exists("bairro", $dados_php) ? $dados_php["bairro"] : $cliente->bairro);

        $cliente->cidade = (array_key_exists("cidade", $dados_php) ? $dados_php["cidade"] : $cliente->cidade);

        $cliente->estado = (array_key_exists("estado", $dados_php) ? $dados_php["estado"] : $cliente->estado);

        $cliente->save();
        
        return $cliente;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $cliente = Cliente::findOrFail($id);
         $cliente->delete();
    }
}
