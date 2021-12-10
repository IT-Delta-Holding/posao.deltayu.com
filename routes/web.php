<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

    /**
    *Home Routes
    */
    Route::view('/','home.index')->name('home.index');
    Route::view('/delta-agrar','home.agrar')->name('home.agrar');
    Route::view('/dts','home.dts')->name('home.dts');

Route::group(['middleware'=> ['guest']], function(){
       /**
        * Register Routes
        */
       Route::get('/register', 'RegisterController@show')->name('register.show');
       Route::post('/register', 'RegisterController@register')->name('register.register');

       /**
        * Login Routes
        */
       Route::get('/login', 'LoginController@show')->name('login.show');
       Route::post('/login', 'LoginController@login')->name('login.login');

    });

Route::group(['middleware'=> ['auth']], function(){

//        Route::resource('roles', RoleController::class);
//        Route::resource('users', UserController::class);
//        Route::resource('products', ProductController::class);

    Route::get('/legal-entities', 'LegalEntityController@index')->name('legal-entities.index');
    Route::get('/roles', 'RoleController@index')->name('roles.index');
    Route::get('/users', 'UserController@index')->name('users.index');

        /**
         * Logout Routes
         */
        Route::get('logout', 'LogoutController@perform')->name('logout.perform');
    });



Route::get('/legalentities', 'LegalEntityController@index')->name('legalentities.index');
Route::get('/legalentities/create', 'LegalEntityController@create')->name('legalentities.create');
Route::post('/legalentities/store', 'LegalEntityController@store')->name('legalentities.store');
Route::delete('/legalentities/destroy/{id}', 'LegalEntityController@destroy')->name('legalentities.destroy');
Route::get('/legalentities/show/{id}', 'LegalEntityController@show')->name('legalentities.show');
Route::get('/legalentities/edit/{id}', 'LegalEntityController@edit')->name('legalentities.edit');
Route::put('/legalentities/update/{id}', 'LegalEntityController@update')->name('legalentities.update');

Route::get('/positions', 'PositionController@index')->name('positions.index');
Route::get('/positions/create', 'PositionController@create')->name('positions.create');
Route::post('/positions/store', 'PositionController@store')->name('positions.store');
Route::delete('/positions/destroy/{id}', 'PositionController@destroy')->name('positions.destroy');
Route::get('/positions/show/{id}', 'PositionController@show')->name('positions.show');
Route::get('/positions/edit/{id}', 'PositionController@edit')->name('positions.edit');
Route::put('/positions/update/{id}', 'PositionController@update')->name('positions.update');




//Route::get('/', function () {
//    return view('welcome');
//});
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});

Route::get('clear', function (){
   Artisan::call('cache:clear');
   Artisan::call('route:clear');
   Artisan::call('view:clear');
   Artisan::call('config:clear');
   echo "All cleared.";
});
