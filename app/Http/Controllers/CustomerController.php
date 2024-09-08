<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    //
    public function customers(){
        if(Auth::check()){
            return view('pages/customers');
        }else{
            return view('pages/login');
        }
    }

    public function addNewCustomer(){
        if(Auth::check()){
            return view('pages/createNewCustomers');
        }else{
            return view('pages/login');
        }
    }
}
