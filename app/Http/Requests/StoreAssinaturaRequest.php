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
            'assinante_id' => 'required',
            'revista' => 'required',
            'status' => 'required',
        ];
    }

    public function messages()
    {
        return ['assinante_id.required' => 'O campo assinante deve conter um assinante previamente cadastrado.'];
    }
}
