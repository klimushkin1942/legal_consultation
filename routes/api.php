<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Request\RequestController;
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

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::group(['middleware' => ['auth:sanctum']], function () {
   Route::prefix('/requests')->group(function () {
       Route::get('/',[RequestController::class, 'index']);
       Route::get('/random',[RequestController::class, 'randomIndexClient']);
       Route::get('/filter',[RequestController::class, 'filterIndex']);
       Route::get('/{request}', [RequestController::class, 'show']);
       Route::post('/', [RequestController::class, 'store']);
       Route::put('/{modelRequest}/lawyer', [RequestController::class, 'updateLawyer']);
       Route::put('/{modelRequest}/client', [RequestController::class, 'updateClient']);
       Route::delete('/{request}', [RequestController::class, 'destroy']);
   });
});
