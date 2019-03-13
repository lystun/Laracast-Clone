<?php

namespace LaracastClone\Http\Controllers;

use Illuminate\Http\Request;
use LaracastClone\Series;

class FrontendController extends Controller
{
    //
    public function welcome(){

        $series = Series::all();
        return view('welcome', ['series' => $series ]);
    }

    public function series(Series $series){
        return view('series', ['series' => $series]);
    }
}
