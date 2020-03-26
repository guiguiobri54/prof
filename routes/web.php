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


Route::get('/Teacher/Home', 'TeacherController@home')->name('TeacherHome');

Route::get('/Student/Home', 'StudentController@home')->name('StudentHome');

route::resource('/Profile', 'ProfileController');

route::group(['prefix' => 'Admin', 'middleware' => 'is.admin'], function(){

    Route::get('/Home', 'AdminController@home')->name('AdminHome');
    route::resource('/Subject', 'SubjectController');
    route::resource('/UserManaging', 'UserManagingController');
});

//Route::get('/Profile/MyProfile','ProfileController@MyProfile')->name('MyProfile');

route::resource('/Classroom', 'ClassroomController');
route::get('/Classroom/{classroom_id}/List','ClassroomController@list')->name('Classroom.usersList');

//route::post('/Classroom', 'ClassroomController@join')->name('join.classroom');

route::resource('/Study', 'StudyController');

route::post('/Study/Attach', 'StudyController@attach')->name('Study.attach');



route::get('/Study/{study_id}/File/', 'FileController@showUploadForm') ->name('upload.file');



route::post('/File', 'FileController@saveFile')->name('save.file');

route::delete('/File/{file_id}', 'FileController@destroy')->name('File.destroy');

//route::resource('/ClassroomSubscription', 'ClassroomSubscriptionController',['parameters' => ['/ClassromSubscription'=> 'classroom_id']]);

route::post('/ClassroomSubscription', 'ClassroomSubscriptionController@store')->name('ClassroomSubscription.store');
//route::get('/ClassroomSubscription', 'ClassroomSubscriptionController@index')->name('ClassroomSubscription.index');
route::get('/Classroom/{id}/ClassroomSubscription', 'ClassroomSubscriptionController@index')->name('ClassroomSubscription.index');
route::get('/ClassroomSubscription/{id}/show','ClassroomSubscriptionController@show')->name('ClassroomSubscription.show');
route::get('/ClassroomSubscription/{id}','ClassroomSubscriptionController@create')->name('ClassroomSubscription.create');
route::delete('/ClassroomSubscription/{id}/del','ClassroomSubscriptionController@destroy')->name('ClassroomSubscription.destroy');