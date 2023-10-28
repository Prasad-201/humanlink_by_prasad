<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidLinkedInUrl implements Rule
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
        // Validate if the value is a valid LinkedIn URL
        return preg_match('/^(https?:\/\/)?(www\.)?linkedin\.com\/in\/[a-zA-Z0-9_-]+\/?$/', $value);
    }

    public function message()
    {
        return 'The :attribute must be a valid LinkedIn URL.';
    }
    }
