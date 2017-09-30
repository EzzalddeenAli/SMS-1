<?php

Route::view('/', 'home.main')->name('home.main');
//Route::get('home', 'HomeController@index')->name('user.dashboard');

//Auth::routes();
Route::get('logout', 'Auth\LoginController@logout');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

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
    Route::get('sections', 'TeacherController@sections')->name('teacher.section.list');
    Route::get('/section/{subject_id}', 'TeacherController@section')->name('section');
});

Route::prefix('admin')->group(function () {
    //Login Controllers
    Route::get('login', 'Auth\AdminLoginController@login')->name('admin.login');
    Route::post('login', 'Auth\AdminLoginController@authenticate')->name('admin.authenticate');

    //Dashboard Controllers
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('teachers', 'AdminController@teachers')->name('admin.teacher.list');
});

Route::prefix('registrar')->group(function () {
    //Login Controllers
    Route::get('login', 'Auth\RegistrarLoginController@login')->name('registrar.login');
    Route::post('login', 'Auth\RegistrarLoginController@authenticate')->name('registrar.authenticate');

    //Dashboard Controllers
    Route::get('/', 'RegistrarController@index')->name('registrar.dashboard');
    Route::get('teachers', 'RegistrarController@teachers')->name('registrar.teacher.list');
    Route::get('students', 'RegistrarController@students')->name('registrar.student.list');
    Route::get('section/{id}', 'RegistrarController@section')->name('registrar.section');
    Route::get('levels', 'RegistrarController@levels')->name('registrar.levels.list');


});

//@todo add layer of protection here asap
//Resource
Route::prefix('resource')->group(function () {
    //Resource Section...
    Route::get('sections', 'ResourceSectionController@index')->name('section.list');
    Route::post('section', 'ResourceSectionController@store')->name('add.section');

    //Resource Subject...
    Route::patch('subjects', 'ResourceSubjectController@update')->name('update.subjects');
    Route::post('subject', 'ResourceSubjectController@store')->name('add.subject');

    //Resource Student...
    Route::get('students/{username}', 'ResourceStudentController@edit')->name('edit.student');
    Route::patch('student', 'ResourceStudentController@update')->name('update.student');
    Route::post('student', 'ResourceStudentController@store')->name('add.student');
    Route::delete('student/{username}', 'ResourceStudentController@destroy')->name('delete.student');

    //Resource Teacher...
    Route::patch('teacher', 'ResourceTeacherController@update')->name('update.teacher');
    Route::post('teacher', 'ResourceTeacherController@store')->name('add.teacher');
    Route::get('teacher/{username}', 'ResourceTeacherController@edit')->name('edit.teacher');
    Route::delete('teacher/{username}', 'ResourceTeacherController@destroy')->name('destroy.teacher');

    //Resource Grade...
    Route::get('/{section_id}/{username}', 'ResourceGradeController@edit')->name('edit.grade');
    Route::patch('grade', 'ResourceGradeController@update')->name('update.grade');
});

