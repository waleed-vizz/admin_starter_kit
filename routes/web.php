<?php

use Illuminate\Support\Facades\App;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\NewsLetterController;
use App\Http\Controllers\PermissionController;
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



Route::controller(HomeController::class)->middleware(Authenticate::class)->group(function () {

    Route::get('/', 'home')->name('home');
    Route::get('/home', 'home')->name('home');
});


Route::get('logout', [AuthController::class, 'logout'])->name('logout')->middleware(Authenticate::class);


Route::controller(AuthController::class)->middleware(RedirectIfAuthenticated::class)->group(function () {

    Route::get('login', 'view')->name('login');
    Route::post('/login', 'login');


    Route::get('register', 'create')->name('register');
    Route::post('register', 'register');
});

Route::get('/profile', function () {
    return view('backend.users.profile');
})->name('profile')->middleware(Authenticate::class);


Route::prefix('admin')->name('admin.')->middleware(Authenticate::class)->group(function () {

    Route::controller(AdminDashboardController::class)->group(function () {
        Route::get('/', 'index')->name('dashboard');
    });

    Route::controller(RoleController::class)->middleware('permission:manage roles and permissions')->group(function () {
        Route::get('/roles', 'index')->name('roles');
        Route::get('/roles/create', 'create')->name('roles.create');
        Route::post('/roles/create', 'store');
        Route::get('/role/update/{role}', 'edit')->name('roles.update');
        Route::post('/role/update/{role}', 'update');
        Route::get('/role/delete/{role}', 'destroy')->name('roles.delete');
    });
    Route::controller(PermissionController::class)->middleware('permission:manage roles and permissions')->group(function () {
        Route::get('/permissions', 'index')->name('permissions');
        Route::get('/permissions/create', 'create')->name('permissions.create');
        Route::post('/permissions/create', 'store');
        Route::get('/permission/update/{permission}', 'edit')->name('permissions.update');
        Route::post('/permission/update/{permission}', 'update');
        Route::get('/permission/delete/{permission}', 'destroy')->name('permissions.delete');
    });

    Route::controller(UserController::class)->group(function () {
        Route::get('/users', 'index')->name('users');
        Route::get('/user/create', 'create')->name('user.create');
        Route::post('/user/create', 'store');
        Route::get('/user/update/{user}', 'edit')->name('user.update');
        Route::post('/user/update/{user}', 'update');
        Route::get('/user/delete/{user}', 'destroy')->name('user.delete');
    });
});



Route::get('/message', [NewsLetterController::class, 'subscribe']);

// Route::get('/test/{lang}', function($lang){
//     //  dd($lang);
// })->name('lang.switch');

Route::get('/test/{lang}', [LanguageController::class, 'switchLang'])->name('lang.switch');

Route::get('/languageDemo', 'App\Http\Controllers\HomeController@languageDemo');

Route::get('/payment', [PaymentController::class, 'payment']);
Route::get('/success', [PaymentController::class, 'success']);
Route::get('/error', [PaymentController::class, 'error']);

Route::get('/scrap', [MessageController::class, 'scrap']);

Route::get('lang/home', [LanguageController::class, 'index']);
Route::get('lang/change', [LanguageController::class, 'change'])->name('changeLang');



Route::get('/new-layout', function () {
    return view('layouts.new');
});
