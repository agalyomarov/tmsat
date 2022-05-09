<?php

namespace App\Http\Requests;

use App\Rules\LowerCase;
use App\Rules\Uppercase;
use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'login' => ['required', 'alpha', new LowerCase, 'unique:users,login', 'min:5', 'max:8'],
            'password' => ['required', 'min:5', 'max:8']
        ];
    }
}
