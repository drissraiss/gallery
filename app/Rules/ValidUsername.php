<?php

namespace App\Rules;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidUsername implements Rule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    /* public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
    } */
    public function passes($attribute, $value)
    {
        // Define your validation logic here
        return preg_match('/^[a-zA-Z0-9_-]+$/', $value);
    }
    public function message()
    {
        //return "The :attribute must contain only letters, numbers, underscores, and hyphens.";
        
        return __('validation.username');
    }
}

