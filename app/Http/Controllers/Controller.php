<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function redirectWithMsg($type, $message, $routeName)
    {
        $toPath = function() use ($routeName) {
            if($routeName == 'back') {
                return redirect()->back();
            }
            return redirect()->route($routeName);
        };

        switch ($type) {
            case 'error':
                flash($message)->error();
                return $toPath();
            default:
                flash($message)->success();
                return $toPath();
        }
    }
}
