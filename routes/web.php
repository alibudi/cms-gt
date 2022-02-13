<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\BreakingNews;
use App\Http\Controllers\Admin\BreakingNewsController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GaleryController;
use App\Http\Controllers\Admin\HeadlineController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\TopikController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VideoController;
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
    Route::get('article/create',[ArticleController::class,'create'])->name('article.create');
    // Route::get('article/{status}',  [ArticleController::class,'index']);
    Route::get('article/draft',  [ArticleController::class,'draft'])->name('article.draft');
    Route::resource('article',ArticleController::class);
    Route::resource('categori',CategoryController::class);
    Route::resource('galeri',GaleryController::class);
    Route::resource('users',UserController::class);
    Route::get('photo',[GaleryController::class,'photo'])->name('photo');
    Route::get('photo/frame',[GaleryController::class,'photoFrame'])->name('photo-frame');
    Route::resource('news', BreakingNewsController::class);
    Route::resource('topic', TopikController::class);
    Route::resource('videos', VideoController::class);
    Route::resource('headline', HeadlineController::class);
        Route::get('post/autocomplete', [ArticleController::class, 'autocomplete'])->name('post.autocomplete');
});