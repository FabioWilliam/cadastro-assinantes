<?php

namespace App\Http\Controllers;

use App\Cep;
use Illuminate\Http\Request;

class EnderecoController extends Controller
{
    public function show($cep, Request $request)
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
