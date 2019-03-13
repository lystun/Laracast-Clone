<?php

namespace LaracastClone\Http\Controllers;

use Illuminate\Http\Request;

use LaracastClone\User;

class ConfirmEmailController extends Controller
{

    public function index(){

        $token = request('token');
        $user = User::where('confirm_token', $token)->first();

        if($user){
            $user->confirm();
            session()->flash('success', 'Email Confirmed');
            return redirect('/');
        } else {
            session()->flash('error', 'Confirmation token not recognized');
            return redirect('/');
        }

    }

}
