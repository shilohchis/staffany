<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Carbon\Carbon;

class EndShift implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($start, $end)
    {
        $this->start = new Carbon($start);
        $this->end = new Carbon($end);
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
        return !$this->end->lessThanOrEqualTo($this->start);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The end shift must be greater than start shift.';
    }
}
