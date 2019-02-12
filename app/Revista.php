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

}
