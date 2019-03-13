<?php

namespace LaracastClone;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Redis;
use LaracastClone\Entities\Learning;

class User extends Authenticatable
{
    use Notifiable, Learning;

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','username', 'confirm_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isConfirmed(){
        return $this->confirm_token == null;
    }

    public function confirm(){
        $this->confirm_token = null;
        $this->save();
    }

    public function isAdmin(){
        return in_array($this->email, config('laracastClone.administrators'));
    }

    public function getRouteKeyName()
    {
        return 'username';
    }

}
