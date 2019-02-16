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

Route::get('/DefaultUser/Home', 'DefaultUserController@home')->name('DefaultUserHome');

Route::get('/Admin/Home', 'AdminController@home')->name('AdminHome');

Route::get('/Headmaster/Home', 'HeadmasterController@home')->name('HeadmasterHome');

Route::get('/Teacher/Home', 'TeacherController@home')->name('TeacherHome');

Route::get('/Student/Home', 'StudentController@home')->name('StudentHome');

Route::resource('/Admin/School', 'SchoolController');

route::resource('/Admin/Subject', 'SubjectController');