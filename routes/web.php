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
route::get('/Classroom/{classroom_id}/BanUser/{user_id}','ClassroomController@banUser')->name('Classroom.banUser');

//route::post('/Classroom', 'ClassroomController@join')->name('join.classroom');

route::resource('/Study', 'StudyController');
route::post('/Study/Attach', 'StudyController@attach')->name('Study.attach');

//Study & File
route::get('/Study/{study_id}/File/', 'FileController@showUploadForm') ->name('upload.file');
route::post('/File', 'FileController@saveFile')->name('save.file');
route::delete('/File/{file_id}', 'FileController@destroy')->name('File.destroy');

//ClassroomSubscription:
route::post('/ClassroomSubscription', 'ClassroomSubscriptionController@store')->name('ClassroomSubscription.store');
route::get('/Classroom/{classroom}/ClassroomSubscription', 'ClassroomSubscriptionController@index')->name('ClassroomSubscription.index');
route::get('/Classroom/{classroom}/ClassroomSubscription/{id}/show','ClassroomSubscriptionController@show')->name('ClassroomSubscription.show');
route::get('/ClassroomSubscription/{id}','ClassroomSubscriptionController@create')->name('ClassroomSubscription.create');
route::get('/Classroom/{classroom}/ClassroomSubscription/{id}/User/{user}/accept','ClassroomSubscriptionController@accept')->name('ClassroomSubscription.accept');
route::delete('/ClassroomSubscription/{id}/del','ClassroomSubscriptionController@destroy')->name('ClassroomSubscription.destroy');

//Post:
route::get('/Classroom/{classroom}/Post/index','PostController@index')->name('Post.index');
route::get('/Classroom/{classroom}/Post/create','PostController@create')->name('Post.create');
route::post('/Post','PostController@store')->name('Post.store');
route::get('/Classroom/{classroom}/Post/{Post}/edit','PostController@edit')->name('Post.edit');
route::put('/Post/{Post}/update','PostController@update')->name('Post.update');
route::get('/Classroom/{classroom}/Post/{Post}/show','PostController@show')->name('Post.show');
route::delete('/Post/{Post}/del','PostController@destroy')->name('Post.destroy');

//Comment & Reply
route::get('/Post/{Post}/Comment/create', 'CommentController@create')->name('Comment.create');
route::post('/Comment', 'CommentController@store')->name('Comment.store');
route::post('/Comment/Reply', 'CommentController@replyStore')->name('CommentReply.store');
route::get('/Post/{Post}/Comment/{Comment}/show', 'CommentController@show')->name('Comment.show');
route::get('/Post/{Post}/Comment/{Comment}/edit', 'CommentController@edit')->name('Comment.edit');
route::put('/Comment/{Comment}/update', 'CommentController@update')->name('Comment.update');
route::delete('/Comment/{Comment}/del', 'CommentController@destroy')->name('Comment.destroy');