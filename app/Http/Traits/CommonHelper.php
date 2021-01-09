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
