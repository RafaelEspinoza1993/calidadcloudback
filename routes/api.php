<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\CheckHeader;


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
Route::middleware([CheckHeader::class])->group(function(){
    Route::post('/show', [UsersController::class, 'show']);
    Route::post('/create', [UsersController::class, 'create']);
    Route::post('/update', [UsersController::class, 'update']);
    Route::post('/delete', [UsersController::class, 'delete']);
});