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
Route::get('/addemployee', function () {
    return view('addemployee');
});
Route::get('/showemployee', function () {
    return view('showemployee');
});
Route::get('/adddepartment', function () {
    return view('adddepartment');
});
Route::get('/addfacultymember', function () {
    return view('addfacultymember');
});
//Route::get('addemployee','employee@create');
//Route::view('addemployee','employee@create');

Route::resource('employee','employee');
//Route::view('addemployee','addemployee');
