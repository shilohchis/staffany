<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\CommonHelper;
use App\Week;

class HomeController extends Controller
{
    use CommonHelper;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $date = $this->startAndEndDateOfWeek($shift->start_time, 'Y-m-d');
        $shifts = Week::betweenDate($date['start'], $date['end'])
                    ->byUser(auth()->user()->id)
                    ->get();
        return view('dashboard', compact('shifts'));
    }
}
