<?php


namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Vigencia;

class StoreRevistaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $codigo = $this->request->get('codigo');
        return [
            'titulo'    => 'required|max:50',
            'codigo'    => 'required|max:3|unique:revistas,codigo,$codigo|max:3|min:3',
            'descricao' => 'required|max:500',
            'formato'   => 'required|in:"D","I"',
            'valor'     => 'required|gt:5|lt:30',
            'vigencia'  => ['required', new Vigencia],
            'site'      => 'url',
            'capa'      =>  'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'assuntos'  => 'required|array|min:2',
            'observacoes' => 'nullable|max:500',

        ];
    }

    public function attributes()
    {
        return [
            'titulo'    => 'Título',
            'codigo'    => 'Código',
            'descricao' => 'Descrição',
            'formato'   => 'Formato',
            'valor'     => 'Valor',
            'vigencia'  => 'Vigência',
            'site'      => 'Site',
            'capa'      => 'Capa',
            'assuntos'  => 'Assunto',
            'observacoes' => 'Observações',
        ];
    }

}
