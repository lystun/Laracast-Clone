<?php

namespace LaracastClone\Http\Controllers;

use Illuminate\Http\Request;
use LaracastClone\User;

class ProfileController extends Controller
{


    public function index(User $user){
        return view('profile')
            ->withUser($user)
            ->withSeries($user->seriesBeingWatched());
    }


}
