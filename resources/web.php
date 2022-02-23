<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DealerController;
use App\Http\Controllers\SalesOfficerController;
use App\Http\Controllers\RequirementFormController;
use App\Http\Controllers\RequirementProductController;
use App\Http\Controllers\PartialDeliveryController;
use App\Http\Middleware\adminMiddleware;
use App\Http\Middleware\userMiddleware;
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

Route::get('test',[DealerController::class,'MultiDependency']);

// Route::group(['middleware' => ['role:Admin']], function () {

    Route::resource('user',UserController::class);
    Route::resource('product',ProductController::class);
    Route::resource('dealer',DealerController::class);
    Route::resource('sales-officer',SalesOfficerController::class);
    Route::resource('partial-delivery',PartialDeliveryController::class);
    Route::get('/partial-delivery/pdf/{id}/{date}', [PartialDeliveryController::class, 'createPDF'])->name('partial.pdf');
    Route::resource('requirement-details',RequirementProductController::class);//invoice
    Route::post('dealer-adresses',[DealerController::class,'MultiDependency'])->name('dealer.address');
    Route::resource('role',RoleController::class);
// });
//=================================== front-routes ============================//

    // Route::group(['middleware' => ['role:SR|Admin']], function () {
        Route::get('my-profile',[UserController::class,'myProfile'])->name('profile.index');
        Route::post('my-profile/image',[UserController::class,'profileImage'])->name('profile.image');
        Route::post('my-profile/change-password',[UserController::class,'PassWordChange'])->name('change.password');
        Route::post('product-info',[RequirementFormController::class,'ProductInfo'])->name('requirementform.productinfo');
        Route::post('dealer-info',[RequirementFormController::class,'DealerInfo'])->name('requirementform.dealerinfo');
        Route::resource('requirement-form',RequirementFormController::class);
        Route::resource('requirement-details',RequirementProductController::class);
        Route::get('/requirement-form/pdf/{id}', [RequirementFormController::class, 'createPDF'])->name('pdf');
    // });


    Route::post('requirement-form/update-asm-status',[RequirementFormController::class,'AsmStatus'])->name('requirementform.asm.status');
    Route::post('requirement-form/update-do-status',[RequirementFormController::class,'DoStatus'])->name('requirementform.do.status');
    
    Route::get('run',function(){
    Artisan::call('optimize');
    });

