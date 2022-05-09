<?php

namespace App\Http\Requests;

use App\Rules\LowerCase;
use App\Rules\Uppercase;
use App\Rules\UserSendBalanceToUser as RulesUserSendBalanceToUser;
use Illuminate\Foundation\Http\FormRequest;

class UserSendBalanceToUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'balance' => ['required', 'numeric', 'min:0.1', new RulesUserSendBalanceToUser],
            'login' => ['required', 'exists:users,login'],
        ];
    }
}
