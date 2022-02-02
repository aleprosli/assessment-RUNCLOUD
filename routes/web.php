<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//workspace route
Route::post('/workspace/create', [App\Http\Controllers\User\WorkspaceController::class, 'store'])->name('workspace:store');
Route::get('/workspace/show/{workspace}', [App\Http\Controllers\User\WorkspaceController::class, 'show'])->name('workspace:show');

//task route
Route::post('/task/store', [App\Http\Controllers\User\TaskController::class, 'store'])->name('task:store');