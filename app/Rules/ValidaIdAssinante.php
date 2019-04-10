<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidaIdAssinante implements Rule
{

    public function passes($attribute, $value)
    {
        return $value != '';
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'O campo Assinante deve estar na base de dados, escolha um assinante válido.';
    }
}
