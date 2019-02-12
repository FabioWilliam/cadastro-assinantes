<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Revista extends Model
{
    public function setAssuntosAttribute($value)
    {
        $this->attributes['assuntos'] = implode(',', $value);
    }

    public function getAssuntosAttribute($value)
    {
        return explode(',', $value);
    }

    public function getDescricaoReduzida()
    {
        $descricao = explode(' ', $this->descricao);
        $descricao_simples = $descricao[0] . ' ' . $descricao[1] . ' ' . $descricao[2] . ' ' . $descricao[3];
        return $descricao_simples;
    }

}
