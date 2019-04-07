<?php

namespace App\Repository;
use App\Revista;

class RevistasRepository {

    public function getArrayComTodasRevistas()
    {
        return Revista::select('id','codigo','titulo','valor')->get();
    }

    public function getListagemPaginate()
    {
        return Revista::orderBy('id', 'DESC')->paginate(10);
    }
}
