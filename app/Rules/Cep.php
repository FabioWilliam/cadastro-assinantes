<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Cep implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $cep)
    {
        $cep = preg_replace('/[^0-9]/', '', $cep);

        if ($cep < 1000000 || $cep > 99999999) {
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'O :attribute deve ser válido.';
    }
}
