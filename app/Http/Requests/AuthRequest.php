<?php

namespace App\Http\Requests;

use App\Rules\UsersEmailRule;
use App\Rules\UsersPasswordRule;
use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'min:8', 'max:255', new UsersPasswordRule]
        ];
    }
}
