<?php

namespace App\Http\Controllers\Btob;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function homeLayout()
    {
        return View("btob/pages/home");
    }
    public function servicesPage()
    {
        return View("btob/pages/services");
    }

    public function registerPage()
    {
        return View("btob/pages/register");
    }

    public function loginPage()
    {
        return View("btob/pages/login");
    }

    public function aboutPage()
    {
        return View("btob/pages/about");
    }

    public function contactPage()
    {
        return View("btob/pages/contactus");
    }
}
