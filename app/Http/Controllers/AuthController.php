<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\User;

class AuthController extends Controller
{
    function showLoginForm() {
    	return view('login');
    }

    function login(Request $request) {
    	$attempt = Auth::attempt($request->only('nrp', 'password'), true);

    	if ($attempt) {
    		return redirect('/');
    	} else {
    		return redirect()->back();
    	}
    }

    function logout() {
    	Auth::logout();
    	return redirect('/');
    }

    public function showRegister() {
        return view('register');
    }

    public function register(Request $request) {
        if (User::where('nrp', $request->input('nrp'))->count() > 0) {
            Session::flash('message', 'NRP '. $request->input('nrp') .' sudah terdaftar. Silakan hubungi admin AJK jika ingin mengganti password.');
            return redirect('/register');
        }

        $user = new User();
        $user->name = $request->input('name');
        $user->nrp = $request->input('nrp');
        $user->no_hp = $request->input('no_hp');
        $user->password = bcrypt($request->input('password'));
        $bool = $user->save();
        
        return redirect('/');
    }
}
