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

Route::get('/home', 'HomeController@authenticated')->name('home');

Route::get('/DefaultUser/Home', 'DefaultUserController@home')->name('DefaultUserHome');



Route::get('/Headmaster/Home', 'HeadmasterController@home')->name('HeadmasterHome');

Route::get('/Teacher/Home', 'TeacherController@home')->name('TeacherHome');

Route::get('/Student/Home', 'StudentController@home')->name('StudentHome');

route::resource('/Profile', 'ProfileController');

route::group(['prefix' => 'Admin', 'middleware' => 'is.admin'], function(){

    Route::get('/Home', 'AdminController@home')->name('AdminHome');
    Route::resource('/School', 'SchoolController');
    route::resource('/Subject', 'SubjectController');
    route::resource('/UserManaging', 'UserManagingController');
});

//Route::get('/Profile/MyProfile','ProfileController@MyProfile')->name('MyProfile');

route::resource('/Classroom', 'ClassroomController');

route::resource('/Study', 'StudyController');

route::get('/Classroom/StudiesList', 'ClassroomController@list')->name('Classroom.list');

route::get('/Study/{study_id}/File/', 'FileController@showUploadForm') ->name('upload.file');

route::resource('/document', 'DocumentController');