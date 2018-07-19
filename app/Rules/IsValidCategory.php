<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Category;

class IsValidCategory implements Rule
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
        $verified = Category::where('id', $value)->exists();

        return 'isValidCategory' == $verified;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Category not valid.';
    }
}
