<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Week;
use App\Http\Traits\CommonHelper;
use App\Rules\EndShift;

class ShiftController extends Controller
{
    use CommonHelper;

    public function __construct()
    {
        $this->per_page = 10;
    }

    private function validating()
    {
        $start = request('start_date')." ".request('start_time');
        $end = request('end_date')." ".request('end_time');
        request()->validate([
            'title' => 'required|string',
            'end_time' => [
                'required',
                new EndShift($start, $end)
            ],
        ]);
    }

    public function index()
    {
        $shifts = Week::paginate($this->per_page);
        return view('shifts.index', compact('shifts'));
    }

    public function create() //view
    {
        $shift = null;
        return view('shifts.form', compact('shift'));
    }

    public function store()
    {
        $this->validating();

    }

    public function show(Week $shift)  //view
    {

    }

    public function edit(Week $shift) //view
    {

    }

    public function update(Week $shift)
    {

    }

    public function destroy(Week $shift)
    {
        if(!$shift) {
            return $this->resp(false, __('shift.nofound'), 404);
        }
        if($shift->is_published) {
            return $this->resp(false, __('shift.nodel'), 409);
        }
        $shift->delete();
        return $this->resp(true, __('shift.del'));
    }
}
