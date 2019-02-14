<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'array' => 'O :attribute deve ser uma lista.',
    'email' => 'O :attribute deve ser um e-mail válido.',
    'in' => 'O conteúdo escolhido do campo :attribute é inválido.',
    'url' => 'O conteúdo escolhido do campo :attribute é inválido.',
    'active_url' => 'O :attribute não é uma URL ativa.',
    'max' => [
        'numeric' => 'O campo :attribute deve ter no máximo :max caracteres.',
        'string' => 'O campo :attribute deve ter no máximo :max caracteres.',
    ],
    'min' => [
        'numeric' => 'O campo :attribute deve ter no mínimo :min caracteres.',
        'string' => 'O campo :attribute deve ter no mínimo :min caracteres.',
    ],
    'lt' => [
        'numeric' => 'The :attribute deve ser menor que :value.',
        'file' => 'The :attribute deve ser menor que :value kilobytes.',
        'string' => 'The :attribute deve ser menor que :value caracteres.',
        'array' => 'The :attribute deve ter menos de :value items.',
    ],
    'gt' => [
        'numeric' => ':attribute deve ser maior que :value.',
        'file' => 'The :attribute deve ser maior que :value kilobytes.',
        'string' => 'The :attribute deve ser maior que :value caracteres.',
        'array' => 'The :attribute deve ser mais que :value items.',
    ],
    'required' => 'O :attribute é um campo de preenchimento obrigatório.',
    'same' => 'Os campos :attribute e :other devem ser iguais.',
    'unique' => 'O valor do campo :attribute já foi utilizado.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
