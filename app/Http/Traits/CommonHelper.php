<?php

namespace App\Http\Traits;

use Carbon\Carbon;

trait CommonHelper {
    private $success = 'Success';
	private $err = 'Error';
	private $validationError = 'Invalid';

    private function now($format)
    {
        return Carbon::now()->format($format);
    }

    private function formatDateTime($data, $format)
    {
        return Carbon::create($data)->format($format);
    }

    private function getDayFromDate($date)
    {
        return strtolower( Carbon::create($date)->dayName );
    }

    private function getWeekNumberInMonth($date)
    {
        return Carbon::create($date)->weekNumberInMonth;
    }

    private function startAndEndDateOfWeek($d, $format)
    {
        $date = new Carbon($d);
        return [
            'current' => new Carbon($d),
            'start' => $date->startOfWeek()->format($format),
            'end' => $date->endOfWeek()->format($format),
        ];
    }

    private function resp($status = true, $data, $code = 200)
	{
		if($code == 409) {
			$status = $this->validationError;
		} else if($status) {
			$status = $this->success;
		} else if(!$status) {
			$status = $this->err;
		}

		return response()->json([
			'status' => $status,
			'data'  => $data,
		], $code);
	}
}
