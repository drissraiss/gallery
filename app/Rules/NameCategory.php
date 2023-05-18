<?php

namespace App\Rules;

use App\Models\CategoryUser;
use Illuminate\Contracts\Validation\Rule;

class NameCategory implements Rule
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
        //CategoryUser::
        $name = $value;
        $result = CategoryUser::where('name', $name)->where('user_id', session('id'))->exists();
        return !$result;
    }
    public function message()
    {
        //return "The :attribute must contain only letters, numbers, underscores, and hyphens.";
        return __('validation.name_category');
    }
}
