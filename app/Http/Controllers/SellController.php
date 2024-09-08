<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellController extends Controller
{
    //
    public function addNewItem(){
        if(Auth::check()){
            return view('pages/sell');
        }else{
            return view('pages/login');
        }
    }
}
