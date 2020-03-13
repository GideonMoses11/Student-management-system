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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {

    //Department
Route::get('/index', 'DepartmentController@index')->name('index');
Route::get('/create', 'DepartmentController@create')->name('create');
Route::post('/save', 'DepartmentController@save')->name('save');
Route::get('/edit/{id}', 'DepartmentController@edit')->name('edit');
Route::post('/update/{id}', 'DepartmentController@update')->name('update');
Route::delete('/delete/{id}', 'DepartmentController@delete')->name('delete');

//Class
Route::get('/class', 'ClassController@index')->name('class.index');
Route::get('class/create', 'ClassController@create')->name('class.create');
Route::post('/class/save', 'ClassController@save')->name('class.save');
Route::get('/class/edit/{id}', 'ClassController@edit')->name('class.edit');
Route::post('/class/update/{id}', 'ClassController@update')->name('class.update');
Route::delete('class/delete/{id}', 'ClassController@delete')->name('class.delete');

//Student
Route::get('/student', 'StudentController@index')->name('student.index');
Route::get('student/create', 'StudentController@create')->name('student.create');
Route::post('/student/save', 'StudentController@save')->name('student.save');
Route::get('/student/edit/{id}', 'StudentController@edit')->name('student.edit');
Route::post('/student/update/{id}', 'StudentController@update')->name('student.update');
Route::delete('student/delete/{id}', 'StudentController@delete')->name('student.delete');

});

