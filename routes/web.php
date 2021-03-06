<?php

use App\Http\Controllers\AdminCustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SubscriptionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;

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
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth', 'active'])->group(function() {
    Route::middleware('customer')->group(function(){
        Route::get('/home', [HomeController::class, 'index'])->name('home');
        Route::get('/subscription/create', [SubscriptionController::class, 'index'])->name('subscription.create');
        Route::post('order-post', [SubscriptionController::class, 'orderPost'])->name('order-post');
    });

    Route::middleware('admin')->group(function() {
        Route::get('/admin/dashboard', [AdminCustomerController::class, 'index'])->name('admin.index');
        Route::delete('/admin/remove_customer/{user}', [AdminCustomerController::class, 'destroy'])->name('admin.destroy');
        Route::post('/admin/activate/{user}', [AdminCustomerController::class, 'activate'])->name('admin.activate');
        Route::post('/admin/deactivate/{user}', [AdminCustomerController::class, 'deactivate'])->name('admin.deactivate');
    });
});
