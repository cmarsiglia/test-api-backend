<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\UserRegisterController;
use App\Http\Controllers\UserUpdateController;
use App\Http\Controllers\FavoriteCreateController;
use App\Http\Controllers\FavoriteAllController;
use App\Http\Controllers\FavoriteDeleteController;
use App\Http\Controllers\CharacterAllController;
use App\Http\Controllers\CharacterDetailController;


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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/login', UserLoginController::class);

Route::post('/register', UserRegisterController::class);

Route::middleware('auth:sanctum')->group(function () {

    Route::put('/profile/update/{id}', UserUpdateController::class);
    Route::get('/favorite', FavoriteAllController::class);
    Route::post('/favorite', FavoriteCreateController::class);
    Route::delete('/favorite/delete/{id}', FavoriteDeleteController::class);
    Route::get('/character', CharacterAllController::class);
    Route::get('/character/{id}', CharacterDetailController::class);
    
});


