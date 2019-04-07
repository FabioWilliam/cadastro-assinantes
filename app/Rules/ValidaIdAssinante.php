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
        return 'Assinante inexistente, escolha um assinante válido.';
    }
}
