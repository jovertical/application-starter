<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class CorrectPassword implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @param  string $email
     * @param  string|null $attribute
     * @return void
     */
    public function __construct(protected $email, protected $attribute = null)
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
        return Auth::guard('web')->validate([
            'email' => $this->email,
            $this->attribute ?? $attribute => $value
        ]);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('auth.password');
    }
}
