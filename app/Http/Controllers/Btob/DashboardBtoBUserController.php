<?php

namespace App\Http\Controllers\Btob;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardBtoBUserController extends Controller
{
    //
    public function btobDashboard()
    {
        if(Auth::check()){
            return View('btob/pages/dashboard');
        }else{
            return redirect('/btob/login');
        }
        
    }
}
