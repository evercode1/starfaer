<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class NameIsAllowed implements Rule
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

        $fail = ['app',
                 'auth',
                 'broadcasting',
                 'cache',
                 'consonants',
                 'database',
                 'filesystems',
                 'hashing',
                 'image-defaults',
                 'logging',
                 'mail',
                 'queue',
                 'services',
                 'session',
                 'view',
                 'vowels'];

         return in_array($value, $fail) ? false : true;

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'You cannot use that name.';
    }
}
