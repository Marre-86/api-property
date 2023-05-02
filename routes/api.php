<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('houses', 'App\Http\Controllers\HouseController@index');
Route::get('houses/{house}', 'App\Http\Controllers\HouseController@show');
Route::post('houses', 'App\Http\Controllers\HouseController@store');
Route::put('houses/{house}', 'App\Http\Controllers\HouseController@update');
Route::delete('houses/{house}', 'App\Http\Controllers\HouseController@delete');
