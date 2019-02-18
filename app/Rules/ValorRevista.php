<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Log;

class ValorRevista implements Rule
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
    public function passes($attribute, $value)
    {

        Log::debug($value);
        $value = str_replace('R$', '', $value);
        $value = str_replace('$ ', '', $value);
        $value = str_replace('$', '', $value);
        $value = str_replace(',', '.', $value);
        return ($value > 5) && ($value < 30);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'O Valor da Revista está fora da faixa';
    }
}
