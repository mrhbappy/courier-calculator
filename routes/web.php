<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShippingRuleController;
use App\Http\Controllers\ShippingCalculatorController;
use App\Http\Controllers\Api\ShippingApiController;
use App\Http\Middleware\adminMiddleware;
use App\Http\Middleware\userMiddleware;
use App\Http\Middleware\ShippingApi;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->back();
    }
    else{
        return view('auth/login');
    }

});

Route::get('/dashboard',[HomeController::class,'index'])->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {

    Route::group(['middleware' => ['permission:user-list']],function () {
        Route::resource('user',UserController::class);

    });

    Route::group(['middleware' => ['permission:role-list']], function () {
        Route::resource('role',RoleController::class);
    });

    Route::group(['middleware' => ['permission:profile-view']], function () {
        Route::get('my-profile',[UserController::class,'myProfile'])->name('profile.index');
        Route::post('my-profile/image',[UserController::class,'profileImage'])->name('profile.image');
        Route::post('my-profile/change-password',[UserController::class,'PassWordChange'])->name('change.password');
    });

    Route::group(['middleware' => ['permission:rule-create']],function () {
        Route::resource('shipping-rule',ShippingRuleController::class);

    });


    Route::get('shipping-calculator',[ShippingCalculatorController::class,'show'])->name('shipping.calculator.show');
    Route::get('shipping-calculator/create',[ShippingCalculatorController::class,'create'])->name('shipping.calculator.create');

});

Route::get('run',function(){
    Artisan::call('optimize');
});


