<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
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
//Login routes
Route::get('/loginPage',[AuthController::class, 'loginPage'])->name('loginPage');
Route::post('/login',[AuthController::class, 'login'])->name('login');
///Registeration routes
Route::get('/registerPage',[AuthController::class, 'registerPage'])->name('registerPage');
Route::post('/register',[AuthController::class, 'register'])->name('register');

Route::group(['middleware' => ['auth']], function (){
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');

    Route::post('/logout',[AuthController::class, 'logout'])->name('logout');


});

