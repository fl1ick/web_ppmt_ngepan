<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\DetailController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LandingController;
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
    return view('frontend.home');
});
Route::get('/', [\App\Http\Controllers\HomeController::class,'index'])->name('home');
Route::get('/destinaton/{destination:city}',[\App\Http\Controllers\DetailController::class,'show'])->name('destination.show');


Route::get('home', [HomeController::class, 'home'])->name('Home.home');
Route::get('about', [HomeController::class, 'about'])->name('Home.about');
Route::get('destination', [HomeController::class, 'destination'])->name('Home.destination');
Route::get('contract', [HomeController::class, 'contract'])->name('Home.contract');




// Route::get('/', function () {
//     return view('frontend.home');
// });
// Route::get('/about', function () {
//     return view('frontend.about');
// });
// Route::get('/destination', function () {
//     return view('frontend.destination.index');
// });
// Route::get('/destination/detail', function () {
//     return view('frontend.destination.detail');
// });
// Route::get('/contract', function () {
//     return view('frontend.contract');
// });

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'isAdmin','prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::get('dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('permissions', \App\Http\Controllers\Admin\PermissionController::class);
    Route::resource('roles', \App\Http\Controllers\Admin\RoleController::class);
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

    Route::resource('sliders', \App\Http\Controllers\Admin\SliderController::class);
    Route::resource('destinations', \App\Http\Controllers\Admin\DestinationController::class);
    Route::resource('testimonials', \App\Http\Controllers\Admin\TestimonialController::class);
    Route::resource('settings', \App\Http\Controllers\Admin\SettingController::class);
});
