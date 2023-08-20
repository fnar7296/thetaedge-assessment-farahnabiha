<?php

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


// User registration
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'Auth\RegisterController@register');

// User login
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');

// User logout
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

//Middleware
Route::middleware(['auth'])->group(function () {
    // Define your authenticated routes here
});

//Create user profile view and edit functionality
Route::get('/profile', 'UserController@showProfile');
Route::get('/profile/edit', 'UserController@editProfile');
Route::post('/profile/update', 'UserController@updateProfile');
