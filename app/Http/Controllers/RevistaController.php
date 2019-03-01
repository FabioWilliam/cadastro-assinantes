<?php

namespace App\Http\Controllers;

use App\Revista;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRevistaRequest;
use App\Http\Requests\UpdateRevistaRequest;
use App\Repository\ListasRepository;


class RevistaController extends Controller
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
        $revistas = Revista::orderBy('id', 'DESC')->paginate(10);

        return view('revista.index', [
            'revistas' => $revistas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $assuntoslist = $this->listasRepository->getAssuntosList();
        $vigencialist = $this->listasRepository->getVigenciaList();
        return view('revista.create', [
            'assuntos' => $assuntoslist,
            'vigencia' => $vigencialist,
        ]);
   }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRevistaRequest $request)
    {
        $file = $request->file('capa');
        $fileName = time() . '-' . $file->getClientOriginalName();
        $filePath = public_path('capas');

        $file->move($filePath, $fileName);

        $input = $request->all();
        $input['capa'] = $fileName;

        $revista = Revista::create($input);

        return redirect()
            ->route('revistas.index')
            ->withInput()
            ->with('message', 'A revista ' . $revista->titulo . ' foi incluída com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Revista  $revista
     * @return \Illuminate\Http\Response
     */
    public function show(Revista $revista)
    {
        $assuntoslist = $this->listasRepository->getAssuntosList();
        $vigencialist = $this->listasRepository->getVigenciaList();

        return view('revista.show', [
            'assuntos' => $assuntoslist,
            'vigencia' => $vigencialist,
            'revista' => $revista,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Revista  $revista
     * @return \Illuminate\Http\Response
     */
    public function edit(Revista $revista)
    {
        $assuntoslist = $this->listasRepository->getAssuntosList();
        $vigencialist = $this->listasRepository->getVigenciaList();
        return view('revista.edit', [
            'assuntos' => $assuntoslist,
            'vigencia' => $vigencialist,
            'revista'  => $revista,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Revista  $revista
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRevistaRequest $request, Revista $revista)
    {
        $input = $request->all();

        if ($request->hasfile('capa'))
        {
            $file = $request->file('capa');
            $fileName = time() . '-' . $file->getClientOriginalName();
            $filePath = public_path('capas');

            $file->move($filePath, $fileName);
            $input = $request->all();
            $input['capa'] = $fileName;
        }

        $revista->update($input);

        return redirect()
            ->route('revistas.index')
            ->withInput()
            ->with('message', 'A revista ' . $revista->titulo . ' foi alterada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Revista  $revista
     * @return \Illuminate\Http\Response
     */
    public function destroy(Revista $revista)
    {
        $nome = $revista->titulo;

        $revista->delete();

        return redirect()
            ->route('revistas.index')
            ->withInput()
            ->with('message', 'A Revista  ' . $nome . ' foi removida com sucesso!');
    }
}
