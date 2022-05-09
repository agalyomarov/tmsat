<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class UserSendBalanceToUser implements Rule
{
    public function passes($attribute, $value)
    {
        return auth()->user()->balance >= $value;
    }

    public function message()
    {
        return 'На вашем счета не достаточна средства для перевода';
    }
}
