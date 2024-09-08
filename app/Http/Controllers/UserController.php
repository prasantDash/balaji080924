<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    public function register(){
        return View('pages/UserRegistration');
    }

    public function login(){
        return View('pages/login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->to('login');
        
    }



    public function saveUser(Request $request){
        $validated = $request->validate([
            'name' => 'required|',
            'email' => 'required',
            'password'=>'required'
        ]);

        if(User::create($validated)){
            return redirect()->to('login');
        }else{
            return redirect()->to('register');
        }
    }

    public function userLogin(Request $request){
        $credentials = $request->validate([
            'name' => 'required|',
            'password'=>'required'
        ]);
        if(Auth::attempt($credentials)){
            return redirect()->to('dashboard');
        }else{
            return redirect()->to('login');
        }
    }

    public function profile(){
        if (Auth::check()){
            return view('pages/profile');
        }else{
            return view('pages/login');
        }
    }
}
