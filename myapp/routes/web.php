<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\Post;
use App\Models\User;
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
    //$posts=Post::all(); //display all posts
    //$posts=Post::where('user_id', auth()->id())-> get(); //display only logged in users' posts
    if(auth()->check()){
        //$posts=auth()->user()->userPosts()->latest()->get();
        $posts=Post::all();
    }
    
    return view('home',['posts'=>$posts]);
});


//         name of action, cont name::class, function name
Route::post('/register', [UserController::class, 'register']);
Route::post('/logout',[UserController::class, 'logout']);
Route::post('/login',[UserController::class, 'login']);

Route::post('/create-post',[PostController::class,'createPost']);