<?php

Route::view('/', 'home.main')->name('home.main');
Route::get('/home', 'HomeController@index')->name('user.dashboard');

Auth::routes();
Route::get('logout', 'Auth\LoginController@logout');

Route::prefix('student')->group(function () {
    //Login Controllers
    Route::get('login', 'Auth\StudentLoginController@login')->name('student.login');
    Route::post('login', 'Auth\StudentLoginController@authenticate')->name('student.authenticate');

    //Dashboard Controllers
    Route::get('/', 'StudentController@index')->name('student.dashboard');
});

Route::prefix('teacher')->group(function () {
    //Login Controllers
    Route::get('login', 'Auth\TeacherLoginController@login')->name('teacher.login');
    Route::post('login', 'Auth\TeacherLoginController@authenticate')->name('teacher.authenticate');

    //Dashboard Controllers
    Route::get('/', 'TeacherController@index')->name('teacher.dashboard');
    Route::get('/students', 'TeacherController@students')->name('student.list');
});

Route::prefix('admin')->group(function () {
    //Login Controllers
    Route::get('login', 'Auth\AdminLoginController@login')->name('admin.login');
    Route::post('login', 'Auth\AdminLoginController@authenticate')->name('admin.authenticate');

    //Dashboard Controllers
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/teachers', 'AdminController@teachers')->name('teacher.list');
    Route::get('/teachers/{username}', 'ResourceTeacherController@edit');
    Route::patch('/teachers', 'ResourceTeacherController@update')->name('edit.teacher');
    Route::post('/teachers', 'ResourceTeacherController@store')->name('add.teacher');
});

