<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Carbon\Carbon;

class DataNascimento implements Rule
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
        $date = explode('/', $value);

        if (count($date) != 3) {
            return false;
        }

        if (! checkdate($date[1], $date[0], $date[2])) {
            return false;
        }

        $initialDate = Carbon::now()->subYears(18); // 2001-02-01
        $finalDate = Carbon::now()->subYears(80); // 1939-02-01

        $dob = Carbon::create($date[2], $date[1], $date[0]);

        if ($dob >= $finalDate && $dob <= $initialDate) {
            return true;
        }

        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'O campo :attribute é uma data de nascimento inválida.';
    }
}
