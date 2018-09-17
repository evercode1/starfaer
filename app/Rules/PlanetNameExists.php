<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Planet;

class PlanetNameExists implements Rule
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
        $verified = Planet::where('name', $value)->exists();

        return 'PlanetNameExists' == $verified;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The planet name does not exist.';
    }
}
