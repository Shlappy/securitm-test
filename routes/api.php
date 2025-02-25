<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resource('users', UserController::class)
    ->except(['edit', 'store', 'create'])
    ->missing(fn () => abort(404, 'Пользователь не найден'));
Route::post('users', [UserController::class, 'create']);