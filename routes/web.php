<?php

use App\Http\Controllers\AdminCustomerController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin/dashboard', [AdminCustomerController::class, 'index'])->name('admin.index');
Route::delete('/admin/remove_customer/{user}', [AdminCustomerController::class, 'destroy'])->name('admin.destroy');
Route::post('/admin/activate/{user}', [AdminCustomerController::class, 'activate'])->name('admin.activate');
Route::post('/admin/deactivate/{user}', [AdminCustomerController::class, 'deactivate'])->name('admin.deactivate');