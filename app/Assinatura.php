<?php

namespace App;

use App\Revista;
use Illuminate\Database\Eloquent\Model;

class Assinatura extends Model
{
    public function revista()
    {
        return $this->hasOne('App\Revista','id');
    }
}
