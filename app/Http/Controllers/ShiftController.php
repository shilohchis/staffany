<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Week;
use App\Http\Traits\CommonHelper;
use App\Rules\EndShift;
use App\Rules\IsPublished;
use App\Rules\IsClash;

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
        $seg = request()->segment(2);
        //tambahan
        $arr = [
            'title' => 'required|string',
            'end_time' => [
                'required',
                new EndShift($start, $end),
                new IsClash('end')
            ],
            'start_time' => [
                new IsClash('start')
            ],
            'start_date' => [
                new IsPublished(Route::currentRouteAction() == 'update' ? $seg : null),
            ]
        ];
        request()->validate($arr);
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
    {   //dd(request()->all());
        $this->validating();
        try {
            Week::create([
                'title' => request('title'),
                'day' => $this->getDayFromDate( request('start_date') ),
                'week' => $this->getWeekNumberInMonth( request('start_date') ),
                'start_time' => request('start_date')." ".request('start_time'),
                'end_time' => request('end_date')." ".request('end_time'),
                'user_id' => auth()->user()->id
            ]);
            return $this->redirectWithMsg('success', __('flash.sadd'), 'shifts.create');
        } catch(Exception $e) {
            return $this->redirectWithMsg('error', $e->getMessage(), 'back');
        }
    }

    public function show(Week $shift)  //view
    {

    }

    public function edit(Week $shift) //view
    {
        return view('shifts.form', compact('shift'));
    }

    public function update(Week $shift)
    {

    }

    public function publish(Week $shift)
    {
        if(!$shift) {
            return $this->resp(false, __('shift.nofound'), 404);
        }
        $date = $this->startAndEndDateOfWeek($shift->start_time, 'Y-m-d');
        $shifts = Week::betweenDate($date['start'], $date['end'])
                    ->byUser(auth()->user()->id)
                    ->update([
                        'is_published' => true
                    ]);
        return $this->resp(true, __('shift.published'));
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
