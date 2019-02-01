<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Numero implements Rule
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
    public function passes($attribute, $numero)
    {
        $numero = strtolower($numero);

        if (! (($numero >= 1 && $numero <= 999999) || ($numero == 'sn'))) {
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
        return "O campo :attribute deve ser válido ou 'sn'.";
    }
}
