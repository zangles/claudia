<?php

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


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::delete('patient/{patient}/measure', 'PatientController@measuresDestroy')->name('patient.measure.destroy');

Route::resource('patient', 'PatientController');
Route::resource('turns', 'TurnController');
Route::post('/turns/get/{turn}', 'TurnController@getTurn')->name('turns.get');
Route::post('/turns/update2', 'TurnController@update2')->name('turns.update2');
