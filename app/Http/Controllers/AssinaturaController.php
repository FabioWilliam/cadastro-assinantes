<?php

namespace App\Http\Controllers;

use App\Assinatura;
use App\Http\Requests\StoreAssinaturaRequest;
use App\Repository\ListasRepository;
use App\Repository\RevistasRepository;
use Illuminate\Http\Request;


class AssinaturaController extends Controller
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
        $assinaturas = Assinatura::orderBy('id', 'DESC')->paginate(10);

        return view('assinatura.index', [
            'assinaturas' => $assinaturas,
        ]);
    }

    public function create()
    {
        $statusAssinaturas = $this->listasRepository->getStatusAssinatura();
        $revistas = $this->revistasRepository->getArrayComTodasRevistas();
        return view('assinatura.create', [
            'status' => $statusAssinaturas,
            'revistas' => $revistas,
        ]);
    }

    public function store(StoreAssinaturaRequest $request)
    {
        $validated = $request->validated();

        $assinatura = new Assinatura();
        $assinatura->ip = $request->getClientIp();
        $assinatura->assinante_id = $request->assinante_id;
        $assinatura->revista_id = $request->revista;
        $assinatura->status = $request->status;
        $assinatura->save();

        return redirect()
            ->route('assinaturas.index')
            ->with([
                'message' => "A assinatura de $request->nome foi incluído com sucesso!"
            ]);
    }

    public function show(Assinatura $assinatura)
    {
        $statusAssinaturas = $this->listasRepository->getStatusAssinatura();
        $revistas = $this->revistasRepository->getArrayComTodasRevistas();
        return view('assinatura.show', [
            'assinatura' => $assinatura,
            'revistas' => $revistas,
            'status' => $statusAssinaturas,
            'assinante_id' => $assinatura->assinante_id,
        ]);
    }

    public function edit(Assinatura $assinatura)
    {
        $statusAssinaturas = $this->listasRepository->getStatusAssinatura();
        $revistas = $this->revistasRepository->getArrayComTodasRevistas();
        return view('assinatura.edit', [
            'assinatura' => $assinatura,
            'revistas' => $revistas,
            'status' => $statusAssinaturas,
            'assinante_id' => $assinatura->assinante_id,
        ]);
    }

    public function update(StoreAssinaturaRequest $request, Assinatura $assinatura)
    {
        $validated = $request->validated();

        $assinatura->ip = $request->getClientIp();
        $assinatura->assinante_id = $request->assinante_id;
        $assinatura->revista_id = $request->revista;
        $assinatura->status = $request->status;
        $assinatura->save();

        return redirect()
            ->route('assinaturas.index')
            ->with([
                'message' => "A assinatura de $request->nome foi alterada com sucesso!"
            ]);
    }

    public function destroy(Assinatura $assinatura)
    {
        $nome = $assinatura->assinante->nome;

        $assinatura->delete();

        return redirect()
            ->route('assinaturas.index')
            ->with([
                'status' => true,
                'message' =>  "A assinatura de(a) $nome foi removida com sucesso!"
            ]);

    }

    public function batch(Request $request)
    {
        if ($request->has('itens_marcados'))
        {
            $assinaturas = explode('|', $request->itens_marcados);
            Assinatura::destroy($assinaturas);

            return redirect()
                ->route('assinaturas.index')
                ->with([
                    'status' => true,
                    'message' => 'Assinatura(s) removida(s) com sucesso!'
                ]);
        }
    }
}
