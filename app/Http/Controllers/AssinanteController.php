<?php

namespace App\Http\Controllers;

use App\Assinante;
use Illuminate\Http\Request;
use App\Repository\ListasRepository;
use App\Http\Requests\StoreAssinanteRequest;

class AssinanteController extends Controller
{
    private $listasRepository;

    public function __construct()
    {
        $this->listasRepository = new ListasRepository();
    }

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
        $interessesList = $this->listasRepository->getInteressesList();
        $estadosList = $this->listasRepository->getEstadosList();
        $tipoLogradouroList = $this->listasRepository->getTipoLogradouroList();

        return view('assinante.create', [
            'interesses' => $interessesList,
            'estados' => $estadosList,
            'tipos_logradouro' => $tipoLogradouroList,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAssinanteRequest $request)
    {
        $validated = $request->validated();

        $assinante = Assinante::create($request->all());

        return redirect()
            ->route('assinantes.index')
            ->withInput()
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
