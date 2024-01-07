<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// all page view
Route::get('/', [AuthController::class,'loginView'])->name('login.view');
Route::get('/register', [AuthController::class,'registration'])->name('register.view');
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
Route::get('/logout', [AuthController::class, 'logOut'])->name('logOut');
Route::get('/forget', [AuthController::class, 'forget'])->name('forgetView');
Route::get('/otp', [AuthController::class, 'veryfiyOtp'])->name('veryfiyOtp');
Route::get('/reset', [AuthController::class, 'reset'])->name('resetView');



//==================================
// all post user
Route::post('/register', [AuthController::class, 'registerPost'])->name('registerPost');
Route::post('/login', [AuthController::class, 'loginPost'])->name('loginPost');
Route::post('/forget', [AuthController::class, 'forgetPost'])->name('forgetPost');
Route::post('/otp', [AuthController::class, 'otpPost'])->name('otpPost');
Route::post('/reset', [AuthController::class, 'savePwd'])->name('savePwd');

