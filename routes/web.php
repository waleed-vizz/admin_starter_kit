<?php

use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Controllers\AdminDashboardController;

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



Route::controller(HomeController::class)->middleware(Authenticate::class)->group(function(){

    Route::get('/', 'home')->name('home');
    Route::get('/home', 'home')->name('home');
});


Route::get('logout', [AuthController::class,'logout'])->name('logout')->middleware(Authenticate::class);


Route::controller(AuthController::class)->middleware(RedirectIfAuthenticated::class)->group(function(){

    Route::get('login', 'view')->name('login');
    Route::post('/login', 'login');


    Route::get('register','create')->name('register');
    Route::post('register','register');
});




Route::prefix('admin')->name('admin.')->middleware(Authenticate::class)->group( function () {

    Route::controller(AdminDashboardController::class)->group(function (){
        Route::get('/', 'index')->name('dashboard');
    });

    Route::controller(RoleController::class)->group(function (){
        Route::get('/roles', 'index')->name('roles');
        Route::get('/roles/create', 'create')->name('roles.create');
        Route::post('/roles/create', 'store');
        Route::get('/role/update/{role}', 'edit')->name('roles.update');
        Route::post('/role/update/{role}', 'update');
        Route::get('/role/delete/{role}', 'destroy')->name('roles.delete');

    });

    Route::controller(UserController::class)->group(function (){
        Route::get('/users', 'index')->name('users');
        Route::get('/user/create', 'create')->name('user.create');
        Route::post('/user/create', 'store');
        Route::get('/user/update/{user}', 'edit')->name('user.update');
        Route::post('/user/update/{user}', 'update');
        Route::get('/user/delete/{user}', 'destroy')->name('user.delete');

    });
});


