<?php

namespace App\Http\Requests;

use App\Rules\ValidaIdAssinante;
use Illuminate\Foundation\Http\FormRequest;

class StoreAssinaturaRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => 'required',
            'assinante_id' => new  ValidaIdAssinante,
            'revista' => 'required',
            'status' => 'required',
        ];
    }
}
