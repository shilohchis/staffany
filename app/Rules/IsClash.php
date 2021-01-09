<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Http\Traits\CommonHelper;
use App\Week;
use Carbon\Carbon;

class IsClash implements Rule
{
    use CommonHelper;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($type)
    {
        $this->type = $type;
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
        $id = request()->segment(2);
        if($this->type == 'start') {
            $inputDate = request('start_date');
        } else {
            $inputDate = request('end_date');
        }
        $date = $this->startAndEndDateOfWeek( $inputDate." ".$value, 'Y-m-d' );
        $find = Week::betweenDate($date['start'], $date['end'])->byUser(auth()->user()->id);
        if( is_numeric( $id ) ) {
            $find = $find->whereNotIn('id', [$id]);
        }
        foreach($find->get() as $f) {
            $start = new Carbon( $f->start_time );
            $end = new Carbon( $f->end_time );
            if( $date['current']->between($start, $end) ) {
                return false;
            }
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
        return 'Your request is clashed with other shifts, please check again.';
    }
}
