<?php

use App\Http\Controllers\Admin\AdminAdsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdsController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [AdsController::class,'index'])->name('ads.index');

Route::middleware(['auth','verified'])->group(function (){

    Route::resource('user',UserController::class);
    
    Route::resource('ads', AdsController::class)->except('index');

    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');

    Route::middleware(['admin'])->name('admin.')->prefix('admin')->group(function(){
        Route::resource('ads', AdminAdsController::class);

        Route::resource('user',AdminUserController::class);
    });
});


require __DIR__.'/auth.php';
