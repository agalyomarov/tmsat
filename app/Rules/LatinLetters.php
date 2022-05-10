<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class LatinLetters implements Rule
{

    public function passes($attribute, $value)
    {
        return preg_match_all("/^[a-z0-9]+$/", $value);
    }
    public function message()
    {
        return ':attribute должен составить с латинскими буквами';
    }
}
