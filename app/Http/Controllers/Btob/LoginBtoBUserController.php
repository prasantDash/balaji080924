<?php

namespace App\Http\Controllers\Btob;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginBtoBUserController extends Controller
{
    //
    public function btobUserlogout()
    {
        Auth::logout();
        return View('btob/pages/login');
    }
    public function loginUser(Request $request)
    {
        $credentials = $validated = $request->validate([
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
            'btoc' => 'required',
            'btob' => 'required',
        ]);

        if($credentials){
            if(Auth::attempt($credentials)){
                return redirect('btob/btobDashboard');
            }else{
                return redirect('/btob/login');
            }
        }
    }
}
