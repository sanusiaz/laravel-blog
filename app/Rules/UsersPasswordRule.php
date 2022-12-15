<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Http\Service\ValidatorService;

class UsersPasswordRule implements Rule
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
        // check if the password has letters, number and alpabets
        $checkPassword = ValidatorService::__validatePassword(8, $value);
        
        return $checkPassword;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return ':attribute Must be 8-12 characters with at least letters, numbers & Special characters ';
    }
}
