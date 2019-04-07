<?php

namespace App;

use App\Assinante;
use App\Revista;
use Illuminate\Database\Eloquent\Model;

class Assinatura extends Model
{
    protected $guarded = [];

    public function revista()
    {
        return $this->hasOne('App\Revista','id');
    }

    public function assinante()
    {
        return $this->belongsTo('App\Assinante','assinante_id','id');
    }

    public function getDataAssinatura()
    {
        $date = \DateTime::createFromFormat('Y-m-d H:i:s', $this->created_at);
        $dateString = $date->format('d/m/Y');
        return $dateString;
    }

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

}
