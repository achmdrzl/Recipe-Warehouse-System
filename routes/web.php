<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DataRecipeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\HomepageController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', function () {
    return redirect()->route('login');
});

// user controller
Route::group(['middleware' => ['role:user', 'auth']], function () {

    // Dashboard User 
    Route::get('/index', HomepageController::class . '@index')->name('homepage');

    Route::get('/aboutme', function(){
        return view('user.aboutme', ['title' => 'About Me']);
    });

    Route::get('/contact', function(){
        return view('user.contact', ['title' => 'Contact']);
    });

    Route::get('/recipe', function(){
        return view('user.recipe', ['title' => 'Home']);
    });

});

// admin controller
Route::group(['middleware' => ['auth', 'role:user|admin']], function () {

    // Dashboard Admin
    Route::get('/dashboard', DashboardController::class . '@index')->name('home');

    // Users Data
    Route::resource('users', UserController::class);

    // Recipes Data
    Route::resource('recipes', DataRecipeController::class);
});

require __DIR__ . '/auth.php';
