<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Http\Traits\CommonHelper;
use App\Week;

class IsPublished implements Rule
{
    use CommonHelper;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->id = $id;
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
        $date = $this->startAndEndDateOfWeek( $value, 'Y-m-d' );
        $find = Week::betweenDate($date['start'], $date['end'])->byUser(auth()->user()->id);
        if($this->id) {
            $find = $find->whereNotIn('id', [$this->id]);
        }
        $find = $find->first();
        if($find && $find->is_published) {
            return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "You can't add or edit an already published week.";
    }
}
