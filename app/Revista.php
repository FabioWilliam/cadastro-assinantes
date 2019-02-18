<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Revista extends Model
{
    protected $guarded = [];

    public function getValorAttribute($value)
    {
        return str_replace('.', ',', $value);
    }

    public function setValorAttribute($value)
    {
        $value = str_replace('R$', '', $value);
        $value = str_replace('$ ', '', $value);
        $value = str_replace('$', '', $value);
        $this->attributes['valor'] = str_replace(',', '.', $value);
    }

    public function getAssuntosAttribute($value)
    {
        return explode(',', $value);
    }

    public function setAssuntosAttribute($value)
    {
        $this->attributes['assuntos'] = implode(',', $value);
    }

    public function getDescricaoReduzida()
    {
        return substr($this->descricao, 0, 100);
    }

}
