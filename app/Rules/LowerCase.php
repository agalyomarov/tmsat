<?php

namespace App\Rules;

use Illuminate\Support\Str;

use Illuminate\Contracts\Validation\Rule;

class LowerCase implements Rule
{
    public function passes($attribute, $value)
    {
        return Str::lower($value) == $value;
    }

    public function message()
    {
        return 'Поле :attribute обязательно быт в нижнем регистре.';
    }
}
