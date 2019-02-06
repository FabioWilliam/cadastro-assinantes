<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Cep;
use App\Rules\Cpf;
use App\Rules\DataNascimento;
use App\Rules\Numero;
use App\Rules\Telefone;

class UpdateAssinanteRequest extends FormRequest
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
        $id = $this->request->get('id');

        return [
            'nome' => 'required|max:50',
            'email' => "required|email|unique:assinantes,email,$id|max:60",
            'senha' => 'required|max:60',
            'confirma_senha' => 'required|same:senha|max:60',
            'cpf' => ['required','max:14', new Cpf],
            'sexo' => 'required|in:"M","F"',
            'data_nascimento' => ['required', 'max:10', new DataNascimento],
            'cep' => ['required', 'max:9', new Cep],
            'tipo_logradouro' => 'required',
            'logradouro' => 'required|max:60',
            'numero' => ['required', 'max:6', new Numero],
            'complemento' => 'nullable|max:60',
            'bairro' => 'required|max:60',
            'cidade' => 'required|max:60',
            'estado' => 'required|max:2',
            'telefone' => ['required', 'max:15', new Telefone],
            'interesses' => 'required|array|min:3',
            'outras_informacoes' => 'nullable|max:500',
        ];
    }

    public function attributes()
    {
        return [
            'nome' => 'Nome',
            'email' => 'E-mail',
            'senha' => 'Senha',
            'confirma_senha' => 'Confirma Senha',
            'cpf' => 'CPF',
            'sexo' => 'Sexo',
            'data_nascimento' => 'Data Nascimento',
            'cep' => 'CEP',
            'tipo_logradouro' => 'Tipo de Logradouro',
            'logradouro' => 'Logradouro',
            'numero' => 'Número',
            'complemento' => 'Complemento',
            'bairro' => 'Bairro',
            'cidade' => 'Cidade',
            'estado' => 'Estado',
            'telefone' => 'Telefone',
            'interesses' => 'Interesses',
            'outras_informacoes' => 'Outras Informações',
        ];
    }
}
