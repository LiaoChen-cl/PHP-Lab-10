<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

// Home Page: ("/")
Route::get('/', function () {
    //add the ? at the end of user to make it optional as this will cause an issue if no one is logged in
    $user = auth()->user()?->name; // optional, if logged in
    return view('home', ["user" => $user]);
});

// User authentication routes
Route::get('/register', [UserController::class, 'showRegister']); // Registration Page: ("/register"), show registration page
Route::post('/register', [UserController::class, 'register']); // handle registration form submission
Route::post('/login', [UserController::class, 'login']); // handle login form submission
Route::post('/logout', [UserController::class, 'logout']); // logout

// Protected page1
Route::get('/page1', [UserController::class, 'page1']); // display page1 if authenticated


