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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/math/index', 'MathController@index')->name('home');
Route::get('/aplus', 'AplusController@index')->name('home');
Route::post('/aplus/save_result', 'AplusController@save_result')->name('save_result');
Route::get('/math/task', 'MathController@task')->name('table');
Route::get('/aplus/{id}', 'AplusController@task')->name('task');
Route::get('/savemyexams', 'SavemyexamsController@index')->name('home');
//Route::get('/savemyexams/math', 'SavemyexamsController@math')->name('math');
//Route::get('/savemyexams/english', 'SavemyexamsController@english')->name('english');
//Route::get('/savemyexams/physics', 'SavemyexamsController@physics')->name('physics');
//Route::get('/savemyexams/chemistry', 'SavemyexamsController@chemistry')->name('chemistry');
Route::get('/savemyexams/{subj}', 'SavemyexamsController@task')->name('task');

Route::get('/tasks/{id}', 'EidosController@tasks')->name('tasks');
Route::get('/paints', 'EidosController@paints')->name('paints');
Route::get('/icons/{level}', 'EidosController@show_icons')->name('show_icons');
Route::post('/icons/save_result', 'EidosController@save_result')->name('save_result');
Route::get('/find_icons/{level}', 'EidosController@find_icons')->name('icons2');
Route::get('/', 'HomeController@link')->name('link');
Route::get('/create', 'EidosController@create')->name('create');



