<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SellController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Btob\HomeController as BtobHomeControler;
use App\Http\Controllers\Btob\LoginBtoBUserController as LoginBtoBUserController;
use App\Http\Controllers\Btob\RegisterBtoBUserController as RegisterBtoBUserController;
use App\Http\Controllers\Btob\DashboardBtoBUserController as DashboardBtoBUserController;
use App\Http\Controllers\Btob\PurchesBtoBController as PurchesBtoBController;
use App\Http\Controllers\Btob\ProductBtobControllers as ProductBtobControllers;
use App\Http\Controllers\ItemController;

//Middleware
use App\Http\Middleware\AuthenticateUser;
use App\Http\Middleware\AuthenticateUserbtob;


Route::get('/', [HomeController::class,'home'])->name('home');

Route::get("register",[UserController::class,'register'])->name('register');
Route::get("login",[UserController::class,'login'])->name('login');
Route::get("logout",[UserController::class,'logout'])->name('logout');
Route::post('saveUser',[UserController::class,'saveUser'])->name('saveUser');
Route::post('userLogin',[UserController::class,'userLogin'])->name('userLogin');
Route::get('dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
Route::get("profile",[UserController::class,'profile'])->name('profile');
Route::get("addNewItem",[SellController::class,'addNewItem'])->name('addNewItem');
Route::get("customers",[CustomerController::class,'customers'])->name('customers');
Route::get("addNewCustomer",[CustomerController::class,'addNewCustomer'])->name('addNewCustomer');

//Buyers to buyers
Route::prefix('btob')->group(function () {
    Route::get('/', [BtobHomeControler::class,'homeLayout'])->name('homeLayout');
    Route::get('/about', [BtobHomeControler::class,'aboutPage'])->name('about');
    Route::get('/contact', [BtobHomeControler::class,'contactPage'])->name('contact');
    Route::get('/services', [BtobHomeControler::class,'servicesPage'])->name('services');
    Route::get('/register', [BtobHomeControler::class,'registerPage'])->name('btobregister'); 
    Route::get('/login', [BtobHomeControler::class,'loginPage'])->name('btoblogin'); 
    Route::post('/registerUser', [RegisterBtoBUserController::class,'registerBtoBUser'])->name('registerBtoBUser');
    Route::post('/loginUser', [LoginBtoBUserController::class,'loginUser'])->name('loginUser');
    Route::get('/btobDashboard', [DashboardBtoBUserController::class,'btobDashboard'])->name('btobDashboard')->middleware([AuthenticateUser::class,AuthenticateUserbtob::class]);
    Route::get('/btoblogout', [LoginBtoBUserController::class,'btobUserlogout'])->name('btoblogout');
    
    Route::prefix('item')->group(function(){
        Route::get('/', [ItemController::class,'getItem'])->name('getItem')->middleware([AuthenticateUser::class,AuthenticateUserbtob::class]);
        Route::POST('/getItems', [ItemController::class,'getItems'])->name('getItems')->middleware([AuthenticateUser::class,AuthenticateUserbtob::class]);
        Route::POST('createItems', [ItemController::class,'createItems'])->name('createItems')->middleware([AuthenticateUser::class,AuthenticateUserbtob::class]);
        Route::get('getItemCarate', [ItemController::class,'getItemCarate'])->name('getItemCarate')->middleware([AuthenticateUser::class,AuthenticateUserbtob::class]);
        Route::POST('createNewCarate', [ItemController::class,'createNewCarate'])->name('createNewCarate')->middleware([AuthenticateUser::class,AuthenticateUserbtob::class]);
        Route::POST('fetchCarateItems', [ItemController::class,'fetchCarateItems'])->name('fetchCarateItems')->middleware([AuthenticateUser::class,AuthenticateUserbtob::class]);        
    });
    Route::prefix('purches')->group(function(){
        Route::get("/",[PurchesBtoBController::class,'btobPurches'])->name("btobPurches")->middleware([AuthenticateUser::class,AuthenticateUserbtob::class]);
        Route::get("/createPurches",[PurchesBtoBController::class,'createPurches'])->name("createPurches")->middleware([AuthenticateUser::class,AuthenticateUserbtob::class]);
        Route::post("/createPurches",[PurchesBtoBController::class,'createNewPurches'])->name("createNewPurches")->middleware([AuthenticateUser::class,AuthenticateUserbtob::class]);
        Route::post("/getPurchesList",[PurchesBtoBController::class,'getPurchesList'])->name("getPurchesList")->middleware([AuthenticateUser::class,AuthenticateUserbtob::class]);
        
    });
    Route::prefix('product')->group(function(){
        Route::get("/",[ProductBtobControllers::class,'btobproducts'])->name("btobproducts")->middleware([AuthenticateUser::class,AuthenticateUserbtob::class]);
        Route::post("/createNew",[ProductBtobControllers::class,'createNewBtobProduct'])->name("createNewBtobProduct")->middleware([AuthenticateUser::class,AuthenticateUserbtob::class]);
        Route::post("/getProducts",[ProductBtobControllers::class,'getProducts'])->name("getProducts")->middleware([AuthenticateUser::class,AuthenticateUserbtob::class]);        
    });
});

 
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('optimize:clear');
    // return what you want
});
