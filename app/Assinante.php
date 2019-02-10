<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Hash;

class Assinante extends Model
{
    protected $guarded = [];

    /* Quando o método create é executado pelo controlle a model
    executa automatica esta funcao.
    */
    protected static function boot()
    {
        parent::boot();

        static::created(function ($assinante)
        {

        });
    }


    public function setSenhaAttribute($password)
    {
        $this->attributes['senha'] = Hash::make($password);
    }

    public function setConfirmaSenhaAttribute($password)
    {
        $this->attributes['confirma_senha'] = Hash::make($password);
    }

    public function setInteressesAttribute($value)
    {
        $this->attributes['interesses'] = implode(',', $value);
    }

    public function getInteressesAttribute($value)
    {
        return explode(',', $value);
    }

    public function getDataNascimentoAttribute($value)
    {
        $date = \DateTime::createFromFormat('Y-m-d', $value);
        $dateString = $date->format('d/m/Y');
        return $dateString;
    }

    public function setDataNascimentoAttribute($value)
    {
        $date = \DateTime::createFromFormat('d/m/Y', $value);
        $dateString = $date->format('Y-m-d');

        $this->attributes['data_nascimento'] = $dateString;
    }

    public function setAceitaReceberInformacoesAttribute($value)
    {
        $this->attributes['aceita_receber_informacoes'] = ($value == '1') ? 1 : 0;
    }
}
