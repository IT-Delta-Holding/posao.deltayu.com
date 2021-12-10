<?php

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
Route::get('positions/all', 'Api\PositionController@index');
Route::get('positions/{legal_entity_id}', 'Api\PositionController@get');
Route::get('legalEntities/all', 'Api\LegalEntitiesController@index');
Route::get('legalEntities/{uri}', 'Api\LegalEntitiesController@get');

Route::post('application/insert', 'ApplicationController@store');



