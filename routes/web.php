<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MainController;
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

Route::get('/', [MainController::class,'index']);
Route::get('/category/{category:slug}', [MainController::class,'category'])->name('category');
Route::get('/article/{article:slug}', [MainController::class,'article'])->name('article');
Route::post('/comments/{article:slug}',[CommentController::class,'store'])->name('postcomment');
Route::resource('comments',CommentController::class);


Route::prefix('administrator')->middleware(['auth','admin'])->group(function(){
    Route::get('/', [DashboardController::class,'index'])->name('admin');
    Route::resource('categories',CategoryController::class);
    Route::resource('articles',ArticleController::class);
    Route::resource('contacts', ContactController::class);
});


require __DIR__.'/auth.php';

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {     \UniSharp\LaravelFilemanager\Lfm::routes();});


//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');



//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
