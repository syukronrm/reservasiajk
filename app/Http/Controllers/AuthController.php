<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\User;
use Validator;

class AuthController extends Controller
{
    function showLoginForm() {
    	return view('login');
    }

    function login(Request $request) {
        $rules = array(
            'nrp' => 'required',
            'password' => 'required'
        );

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            Session::flash('fail', 'Semua fields harus di isi.');
            return redirect()->route('login');
        } else {
            $userdata = array(
                'nrp' => $request->nrp,
                'password' => $request->password
            );
            if (Auth::attempt(array('nrp' => $userdata['nrp'], 'password' => $userdata['password']), true)) {
                Session::flash('success', 'Sukses login');
                return redirect()->route('index.admin');
            } else {
                Session::flash('fail', 'Gagal login');
                return redirect()->route('login')
                    ->withErrors(['Email/Username atau Password salah'])
                    ->withInput(Input::except('password'));
            }
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
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
