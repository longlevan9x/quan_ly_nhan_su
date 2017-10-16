<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Validator;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function login($request)
    {

        $rules = array(
            'username' =>'required',
            'password' =>'required',
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('admin/')->withInput($request->except('password'))->with('error', $validator->errors());
        }

        $user = [
            'username' => $request->username,
            'password' => $request->password
        ];
        if (Auth::attempt($user)) {
            return true;
        }
        else {
            return false;
        }
    }

    public function getLogin()
    {
        if (Auth::check()) {
            return true;
        }
        return false;
    }

    public function logout()
    {
        return Auth::logout();
    }
}
