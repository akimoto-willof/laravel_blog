<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/articles', 'App\Http\Controllers\ArticlesController@index')->name('blog.index');
Route::get('/article/add', 'App\Http\Controllers\ArticlesController@add')->name('blog.add');
Route::post('/article/complete', 'App\Http\Controllers\ArticlesController@create')->name('blog.create');

Route::get('/article/edit/{article}', 'App\Http\Controllers\ArticlesController@edit');
Route::post('/article/update/{article}', 'App\Http\Controllers\ArticlesController@update');

require __DIR__.'/auth.php';
