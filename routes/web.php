<?php

use App\Http\Controllers\Back\ArticleController;
use App\Http\Controllers\Back\CategoryController;
use App\Http\Controllers\Back\DashboardController;
use App\Http\Controllers\Back\UserController;
use App\Http\Controllers\Front\ArticleController as FrontArticleController;
use App\Http\Controllers\Front\CategoryController as FrontCategoryController;
use App\Http\Controllers\Front\HomeController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

// Route::get('/', function () {
    //     return view('welcome');
    // });

Route::get('/', [HomeController::class, 'index']);
Route::post('/article/search', [HomeController::class, 'index'])->name('search.index');

Route::get('/article', [FrontArticleController::class, 'index'])->name('article.index');
Route::get('/post/{slug}', [FrontArticleController::class, 'show'])->name('post.show');

Route::get('/categrories/all-category', [FrontCategoryController::class, 'allCategory'])->name('category.all');
Route::get('/categrories/{slug}', [FrontCategoryController::class, 'index'])->name('category.index');

Route::get('/about',[HomeController::class, 'about'])->name('about');
Route::get('/contact',[HomeController::class, 'contact'])->name('contact');

Route::middleware('auth')->group(function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    
    Route::resource('/categories', CategoryController::class)->only(['index', 'store', 'update', 'destroy']);
    Route::resource('/articles', ArticleController::class);
       
    Route::group(['prefix' => 'laravel-filemanager'], function () {
         \UniSharp\LaravelFilemanager\Lfm::routes();
     });
    
     Route::resource('users', UserController::class);
}); 


