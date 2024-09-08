<?php

namespace App\Http\Controllers\Btob;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterBtoBUserController extends Controller
{
    //
    public function registerBtoBUser(Request $request)
    {
        
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
            'btoc' => 'required',
            'btob' => 'required',
        ]);

        if($validated){
            $status = User::create($request->all());
            if($status){
                return redirect('/btob/login');
            }
        }
    }
}
