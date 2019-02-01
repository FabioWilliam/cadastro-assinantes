<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Telefone implements Rule
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
    public function passes($attribute, $telefone)
    {
        $telefone = preg_replace('/[^0-9]/', '', $telefone);

        if ((strlen($telefone) != 10) && (strlen($telefone) != 11)) {
            return false;
        }

        if (substr($telefone, 0, 2) < '11') {
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
        return 'O campo :attribute deve ser um telefone válido.';
    }
}
