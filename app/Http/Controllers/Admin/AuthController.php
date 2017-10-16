<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class AuthController extends Controller
{
	protected $user;

	function __construct(User $user)
	{
		$this->user = $user;
	}

    public function getLogin()
    {
    	if ($this->user->getLogin()) {
    		return redirect('admin/home');
    	}
    	return view('admin.auth.login');
    }

    public function postLogin(Request $request)
    {
        if ($this->user->login($request)) {
            return redirect('admin/home');
        }
        else {
            return redirect('admin/')->withInput($request->except('password'))->with('error', "username or password wrong");
        }
    }

    public function getLogout()
    {
        if ($this->user->logout() == null) {
            return redirect('admin');
        }
    }
}
