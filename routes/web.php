<?php

use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

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


Route::domain(env('ADMIN_DOMAIN', 'backend.' . env('DOMAIN', false)))
    ->group(function () {
        Route::middleware('can:use-crud')->group(function () {
            Route::resource('/user', UserController::class);
        });
        require __DIR__ . '/auth.php';
        require __DIR__ . '/admin.php';
    });

Route::get('/', [SiteController::class, 'index'])->name('index');
Route::get('/about', [SiteController::class, 'about'])->name('about');
Route::get('/news', [SiteController::class, 'news'])->name('news');

Route::group(['prefix' => '{alias}'], function () {
    Route::get('/', [CityController::class, 'show'])->name('city.show');
    Route::get('/news', [SiteController::class, 'news'])->name('city.news');
    Route::get('/about', [SiteController::class, 'about'])->name('city.about');
});


