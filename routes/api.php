<?php

use App\Http\Controllers\Api\ProjectController;
use Illuminate\Http\Request;
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

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
 */

Route::get('/test', function () {
    return response()->json([
        'name' => 'Gianni',
        'age' => 33
    ]);
});

//Le rotte api hanno sempre /api davanti ad esse, ed hanno anche dei middleware diversi

Route::get('/projects', [ProjectController::class, 'index']);