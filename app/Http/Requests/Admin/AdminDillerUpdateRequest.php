<?php

namespace App\Http\Requests\Admin;

use App\Rules\LatinLetters;
use App\Rules\LowerCase;
use Illuminate\Foundation\Http\FormRequest;

class AdminDillerUpdateRequest extends FormRequest
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
            'login' => ['required', 'unique:users,login,' . $this->diller_id, 'min:5', 'max:15'],
            'parol' => ['required', 'min:5', 'max:15'],
            'balance' => ['sometimes', 'numeric'],
            'diller_id' => []
        ];
    }
}
