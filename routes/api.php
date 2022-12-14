<?php

use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\BlogpostController;
use App\Models\Blogpost;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/posts', fn() => Blogpost::all());
Route::resource('/posts', BlogpostController::class);

Route::resource('/posts', BlogpostController::class, ['only' => ['index', 'show']]);
Route::resource('/posts', BlogpostController::class, ['except' => ['index', 'show']])->middleware('auth:sanctum');

Route::post('/register', [ApiAuthController::class, 'register']);
Route::post('/login', [ApiAuthController::class, 'login']);
Route::post('/logout', [ApiAuthController::class, 'logout'])->middleware('auth:sanctum');
