<?php

namespace App\Http\Controllers;

use App\Cep;
use Illuminate\Http\Request;

class EnderecoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('cep'))
        {
            return response()->json(['tem cep' => $request->cep]) ;
        } else {
            return response()->json(['nap tem' => 'cep']) ;
        }

        //$endereco = Cep::Find($cep);

        //return response()->json($endereco);
        //return ['fabio' => 'teste'];

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cep  $cep
     * @return \Illuminate\Http\Response
     */
    public function show($cep)
    {
        $endereco = Cep::where('cep', $cep)->get()->first();

        if ($endereco == null) {
            return response()->json([
                'success' => false,
                'message' => 'O CEP não foi encontrado.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $endereco
        ]);
    }

}
