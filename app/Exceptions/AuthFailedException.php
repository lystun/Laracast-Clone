<?php
/**
 * Created by PhpStorm.
 * User: Lystun
 * Date: 2/12/2019
 * Time: 11:18 PM
 */


namespace LaracastClone\Exceptions;
use Exception;


class AuthFailedException extends Exception {

    public function render (){
        return response()->json([
            'message' => 'These credentials do not match our records.'
        ], 422);
    }

}


