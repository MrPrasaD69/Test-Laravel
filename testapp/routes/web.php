<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [UserController::class, 'index'])->name('home');


Route::post('/register', [UserController::class, 'registerUser']);
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('fetchdata',[UserController::class,'showData']);
Route::get('getuser',[UserController::class,'getUser'])->name('getUser'); //define route with name method, capture that name in Front End for routing
Route::get('welcome',[UserController::class,'goBack'])->name('goBack');

