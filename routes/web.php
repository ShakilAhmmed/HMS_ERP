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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('api/v1')->group(function () {
    Route::resource('department','DepartmentController');
    Route::resource('designation','DesignationController');
    Route::resource('shift','ShiftController');
    Route::resource('users','UserController');
});



Route::get('/{vue_capture?}',function () {
	    return view('welcome');
})->where('vue_capture', '[\/\w\.-]*');
