<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GaleryController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
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

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');
 

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::resource('home', DashboardController::class);
    Route::resource('role', RoleController::class);
    Route::post('upload', [ImageController::class,'store'])->name('upload');
    Route::resource('tag', TagController::class);
    Route::get('article/{status}',  [ArticleController::class,'index']);
    Route::resource('article',ArticleController::class);
    Route::resource('categori',CategoryController::class);
    Route::resource('galeri',GaleryController::class);
    Route::resource('users',UserController::class);
});