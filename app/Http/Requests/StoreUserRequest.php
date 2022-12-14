<?php

namespace App\Http\Requests;

use App\Rules\UsersEmailRule;
use App\Rules\UsersPasswordRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
     * @return array<string, mixed>P
     */
    public function rules()
    {
        return [
            "name" => 'required|max:255|unique:users,name',
            'email' => ['required', 'email', 'max:255', new UsersEmailRule],
            'password' => ['required', 'min:8', 'max:255', new UsersPasswordRule]
        ];
    }
}
