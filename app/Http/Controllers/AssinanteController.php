<?php

namespace App\Http\Controllers;

use App\Assinante;
use Illuminate\Http\Request;
use App\Rules\Cep;
use App\Rules\Cpf;
use App\Rules\DataNascimento;
use App\Rules\Numero;
use App\Rules\Telefone;

class AssinanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assinantes = Assinante::orderBy('id', 'DESC')->get();

        return view('assinante.index', [
            'assinantes' => $assinantes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('assinante.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required|max:50',
            'email' => 'required|email|max:60',
            'senha' => 'required|max:60',
            'confirma_senha' => 'required|same:senha|max:60',
            'cpf' => ['required','max:14', new Cpf],
            'sexo' => 'required|in:"M","F"',
            'data_nascimento' => ['required', 'max:10', new DataNascimento],
            'cep' => ['required', 'max:9', new Cep],
            'tipo_logradouro' => 'required|in:"R","AV","AL","Q","RES","OUTROS"',
            'logradouro' => 'required|max:60',
            'numero' => ['required', 'max:6', new Numero],
            'complemento' => 'nullable|max:60',
            'bairro' => 'required|max:60',
            'cidade' => 'required|max:60',
            'estado' => 'required|max:2',
            'telefone' => ['required', 'max:15', new Telefone],
            'interesses' => 'required|array|min:3',
            'outras_informacoes' => 'nullable|max:500',
        ]);

        $assinante = Assinante::create($request->all());

        return redirect()
            ->route('assinantes.index')
            ->with('message', 'O assinante ' . $assinante->nome . ' foi incluído com sucesso! ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Assinante  $assinante
     * @return \Illuminate\Http\Response
     */
    public function show(Assinante $assinante)
    {
        dd($assinante);
        return 'Mostra o Assinante';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Assinante  $assinante
     * @return \Illuminate\Http\Response
     */
    public function edit(Assinante $assinante)
    {
        return 'Edita o Assinante';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Assinante  $assinante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assinante $assinante)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Assinante  $assinante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assinante $assinante)
    {
        return 'Destroy o Assinante';
    }
}
