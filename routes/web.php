<?php

use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\ParserController;
use App\Http\Controllers\Admin\UsersController;

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\ProfileController;

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
Route::view('/', 'index')->name('home');

Route::name('news.')
    ->prefix('news')
    ->group(function () {
        Route::get('/', [NewsController::class, 'index'])->name('index');
        Route::get('/one/{news}', [NewsController::class, 'show'])->name('show');
        Route::name('category.')
            ->group(function () {
                Route::get('/categories', [CategoryController::class, 'index'])->name('index');
                Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('show');
            });
    });

Route::name('admin.')
    ->prefix('admin')
    ->middleware(['auth', 'is_admin'])
    ->group(function () {
        Route::get('/', [AdminNewsController::class, 'index'])->name('index');
        Route::resource('/news', AdminNewsController::class)->except('show');

        Route::get('/users', [UsersController::class, 'index'])->name('updateUsers');
        Route::get('/users/toggleAdmin/{user}',[UsersController::class, 'toggleAdmin'])->name('toggleAdmin');

        Route::get('/parser', [ParserController::class, 'index' ])->name('parser');

        Route::get('/test1', [IndexController::class, 'test1'])->name('test1');
        Route::get('/test2', [IndexController::class, 'test2'])->name('test2');

        Route::get('/ajax', [IndexController::class, 'ajax'])->name('ajax');
        Route::post('/ajax', [IndexController::class, 'send']);
    });

Route::match(['get', 'post'], '/profile', [ProfileController::class, 'update'])->name('updateProfile');


Route::get('/auth/vk', [LoginController::class, 'loginVK'])->name('vklogin');
Route::get('/auth/vk/response', [LoginController::class, 'responseVK'])->name('vkResponse');



Route::view('/about', 'about')->name('about');


Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth', 'is_admin']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Auth::routes();


