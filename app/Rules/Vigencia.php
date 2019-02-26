<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Repository\ListasRepository;

class Vigencia implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    private $listasRepository;

    public function __construct()
    {
        $this->listasRepository = new ListasRepository();
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
    $vigencialist = $this->listasRepository->getVigenciaList();

    return array_search($value,$vigencialist) != 0;
}

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'A :attribute deve ser válida.';
    }
}
