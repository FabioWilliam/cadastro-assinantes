<?php

namespace App\Http\Controllers;

use App\Assinante;
use App\Cep;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function getListaAssinante(Request $request)
    {
        $query = $request->input('query');

        $assinantes = Assinante::select('id', 'nome')
            ->where('nome', 'like', '%' . $query . '%')
            ->get();

        $listaAssinantes = $assinantes->map(function($assinante) {
            return [
                'data' => (string)$assinante->id,
                'value' => $assinante->nome,
            ];
        });

        return response()->json([
            'query' => 'Unit',
            'suggestions' => $listaAssinantes

        ]);
    }

    public function getEndereco($cep, Request $request)
    {
        $token = $request->header('X-Token');

        if ($token != config('api.token'))
        {
            return response()->json([
                'success' => false,
                'message' => 'Token inválido.',
            ], 401);
        }

        $endereco = Cep::where('cep', $cep)->get()->first();

        if ($endereco == null) {
            return response()->json([
                'success' => false,
                'message' => 'O CEP não foi encontrado.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data'    => $endereco
        ]);
    }
}
