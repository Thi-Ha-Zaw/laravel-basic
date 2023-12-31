<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\ItemApiController;
use App\Http\Middleware\Authenticated;
use App\Http\Middleware\SetCheckHeader;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::prefix("v1")->middleware(SetCheckHeader::class)->group(function () {

    Route::controller(AuthController::class)->group(function () {
        Route::post("register","register")->name("api.auth.register");
        Route::post("login","login")->name("api.auth.login");
        Route::post("logout","logout")->name("api.auth.logout")->middleware(Authenticated::class);
    });

    Route::apiResource("item", ItemApiController::class)->middleware(Authenticated::class);
});
