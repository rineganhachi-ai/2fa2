<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VerificationController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', fn () => view('auth.register'))->name('register');
Route::post('/register',[AuthController::class, 'register']);

Route::group(['middleware' => ['auth', 'check_role:customer']], function () {
Route::get('/verify', [VerificationController::class, 'index']);
Route::post('/verify', [VerificationController::class, 'store']);
Route::get('/verify/{unique_id}', [VerificationController::class, 'show']);
Route::put('/verify/{unique_id}', [VerificationController::class, 'update']);
}); // ← INI YANG TADI KURANG

Route::get('/login', fn () => view('auth.login'))->name('login');
Route::post('/login',[AuthController::class, 'login']);

Route::group(['middleware' => ['auth', 'check_role:customer','check_status']],function(){
Route::get('/dashboard',fn () => 'halaman customer');
});

Route::group(['middleware' => ['auth', 'check_role:admin,staff']],function(){
Route::get('/dashboard',[DashboardController::class,'index']);
});

Route::group(['middleware' => ['auth', 'check_role:admin']],function(){
Route::get('/user',fn () => 'halaman user');
});

Route::get('/logout',[AuthController::class, 'logout']);