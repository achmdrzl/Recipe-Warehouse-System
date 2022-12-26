<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DataIngredientController;
use App\Http\Controllers\Admin\DataRecipeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\HomepageController;
use App\Http\Controllers\User\SearchController;
use App\Models\Ingredient;
use App\Models\Recipe;
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
    Route::resource('homepage', HomepageController::class);

    Route::get('/aboutme', function () {
        $recipes = Recipe::paginate(6);
        return view('user.aboutme', ['title' => 'About Me', 'recipes' => $recipes]);
    })->name('aboutme');

    Route::get('/contact', function () {
        return view('user.contact', ['title' => 'Contact']);
    })->name('contactme');

    Route::get('/searchPanel', SearchController::class . '@index')->name('search.panel');
    Route::post('/search', SearchController::class . '@search')->name('search.recipe');

});

// admin controller
Route::group(['middleware' => ['auth', 'role:user|admin']], function () {

    // Dashboard Admin
    Route::get('/dashboard', DashboardController::class . '@index')->name('home');

    // Users Data
    Route::resource('users', UserController::class);

    // Recipes Data
    Route::resource('recipes', DataRecipeController::class);
    Route::post('recipes/images', DataRecipeController::class . '@storeImg')->name('recipes.storeImg');

    // Ingredient Data
    Route::resource('ingredient', DataIngredientController::class);

});


Route::get('/cek', function () {
    return Recipe::with('instruction')->get();
});

require __DIR__ . '/auth.php';
