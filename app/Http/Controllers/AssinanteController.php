<?php

namespace App\Http\Controllers;

use App\Assinante;
use Illuminate\Http\Request;
use App\Repository\ListasRepository;
use App\Http\Requests\StoreAssinanteRequest;
use App\Http\Requests\UpdateAssinanteRequest;
use App\Mail\AssinanteRemovido;
use Mail;

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
        $assinantes = Assinante::orderBy('id', 'DESC')->paginate(10);

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
            ->with('message', 'O assinante ' . $assinante->nome . ' foi incluído com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Assinante  $assinante
     * @return \Illuminate\Http\Response
     */
    public function show(Assinante $assinante)
    {
        $estadosList = $this->listasRepository->getEstadosList();
        $tipoLogradouroList = $this->listasRepository->getTipoLogradouroList();

        return view('assinante.show', [
            'estados' => $estadosList,
            'tipos_logradouro' => $tipoLogradouroList,
            'assinante' => $assinante,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Assinante  $assinante
     * @return \Illuminate\Http\Response
     */
    public function edit(Assinante $assinante)
    {
        $interessesList = $this->listasRepository->getInteressesList();
        $estadosList = $this->listasRepository->getEstadosList();
        $tipoLogradouroList = $this->listasRepository->getTipoLogradouroList();

        return view('assinante.edit', [
            'interesses' => $interessesList,
            'estados' => $estadosList,
            'tipos_logradouro' => $tipoLogradouroList,
            'assinante' => $assinante,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Assinante  $assinante
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAssinanteRequest $request, Assinante $assinante)
    {
        $validated = $request->validated();

        $assinante->update($request->all());

        return redirect()
            ->route('assinantes.index')
            ->withInput()
            ->with('message', 'O assinante ' . $assinante->nome . ' foi alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Assinante  $assinante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assinante $assinante)
    {
        $nome = $assinante->nome;
        $email = $assinante->email;

        Mail::to($email)->send(
            new AssinanteRemovido($assinante)
        );

        $assinante->delete();

        return redirect()
            ->route('assinantes.index')
            ->withInput()
            ->with('message', 'O assinante ' . $nome . ' foi removido com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Assinante  $assinante
     * @return \Illuminate\Http\Response
     */
    public function batch(Request $request)
    {
        if ($request->has('assinantes_marcados'))
        {
            $assinantes = explode('|', $request->assinantes_marcados);
            Assinante::destroy($assinantes);

            return redirect()
                ->route('assinantes.index')
                ->with('message', 'Assinantes removidos com sucesso!');
        }
    }

}
