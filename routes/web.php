<?php

Route::view('/', 'home.main')->name('home.main');

Route::prefix('teacher')->group(function () {
    //Login Controllers
    Route::get('login', 'Auth\TeacherLoginController@login')->name('teacher.login');
    Route::post('login', 'Auth\TeacherLoginController@authenticate')->name('teacher.authenticate');

    //Home Controllers
    Route::get('/', 'TeacherController@index')->name('teacher.dashboard');
});

Route::prefix('admin')->group(function () {
    //Login Controllers
    Route::get('login', 'Auth\AdminLoginController@login')->name('admin.login');
    Route::post('login', 'Auth\AdminLoginController@authenticate')->name('admin.authenticate');

    //Home Controllers
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('user.dashboard');