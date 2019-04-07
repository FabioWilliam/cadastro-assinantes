<?php

namespace App\Http\Controllers;

use App\Revista;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRevistaRequest;
use App\Http\Requests\UpdateRevistaRequest;
use App\Repository\ListasRepository;
Use App\Repository\RevistasRepository;


class RevistaController extends Controller
{
    private $listasRepository;
    private $revistasRepository;

    public function __construct(ListasRepository $listasRepository, RevistasRepository $revistasRepository)
    {
        $this->listasRepository = $listasRepository;
        $this->revistasRepository = $revistasRepository;
    }

    public function index()
    {
        $revistas = $this->revistasRepository->getListagemPaginate();

        return view('revista.index', [
            'revistas' => $revistas
        ]);
    }

    public function create()
    {
        $assuntoslist = $this->listasRepository->getAssuntosList();
        $vigencialist = $this->listasRepository->getVigenciaList();
        return view('revista.create', [
            'assuntos' => $assuntoslist,
            'vigencia' => $vigencialist,
        ]);
   }

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
            ->with([
                'status' => true,
                'message' => "A revista $revista->titulo foi incluída com sucesso!"
            ]);
    }

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
            ->with([
                'status' => true,
                'message' => "A revista $revista->titulo foi alterada com sucesso!"
            ]);
    }

    public function destroy(Revista $revista)
    {
        $nome = $revista->titulo;

        $revista->delete();

        return redirect()
            ->route('revistas.index')
            ->withInput()
            ->with([
                'status' => true,
                'message'=> "A Revista $nome foi removida com sucesso!"
            ]);
    }
}
