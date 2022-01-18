<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\UserController;

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
//
//Route::middleware('auth:sanctum')->get('/users', function (Request $request) {
//    return $request->user();
//});

Route::get('v1/users', [UserController::class, 'index'])->name('users.index');

Route::get('check-auth0', function () {
    return response()->json([
        'message' => 'Secure Zone by token auth0',
    ]);
})->middleware('jwt.auth0');
