<?php

namespace App\Http\Controllers;

use App\Revista;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRevistaRequest;
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Revista  $revista
     * @return \Illuminate\Http\Response
     */
    public function edit(Revista $revista)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Revista  $revista
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Revista $revista)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Revista  $revista
     * @return \Illuminate\Http\Response
     */
    public function destroy(Revista $revista)
    {
        //
    }
}
