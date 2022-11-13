<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\v1\AuthController;
use App\Http\Controllers\api\v1\UserController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('login', [AuthController::class, 'login']);
Route::group([
    'middleware' => 'auth:sanctum',
    'prefix' => 'auth'
], function ($router) {
    Route::get('me', [AuthController::class, 'me'])->name('me');
    Route::get('users', [UserController::class, 'index'])->name('index');
    Route::post('users/store', [UserController::class, 'store']);
    Route::post('users/update', [UserController::class, 'update']);
});
