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
    Route::get('/section/{section_id}/{username}', 'ResourceGradeController@edit');
    Route::patch('grade', 'ResourceGradeController@update')->name('edit.grade');
});

Route::prefix('admin')->group(function () {
    //Login Controllers
    Route::get('login', 'Auth\AdminLoginController@login')->name('admin.login');
    Route::post('login', 'Auth\AdminLoginController@authenticate')->name('admin.authenticate');

    //Dashboard Controllers
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('teachers', 'AdminController@teachers')->name('admin.teacher.list');
    Route::get('teachers/{username}', 'ResourceTeacherController@edit');
    Route::patch('teacher', 'ResourceTeacherController@update')->name('edit.teacher');
    Route::post('teacher', 'ResourceTeacherController@store')->name('add.teacher');
    Route::delete('teacher/{username}', 'ResourceTeacherController@destroy');
});

Route::prefix('registrar')->group(function () {
    //Login Controllers
    Route::get('login', 'Auth\RegistrarLoginController@login')->name('registrar.login');
    Route::post('login', 'Auth\RegistrarLoginController@authenticate')->name('registrar.authenticate');

    //Dashboard Controllers
    Route::get('/', 'RegistrarController@index')->name('registrar.dashboard');
    Route::get('teachers', 'RegistrarController@teachers')->name('registrar.teacher.list');
    Route::get('students', 'RegistrarController@students')->name('registrar.student.list');
    Route::get('students/{username}', 'ResourceStudentController@edit');
    Route::patch('student', 'ResourceStudentController@update')->name('edit.student');
    Route::post('student', 'ResourceStudentController@store')->name('add.student');
    Route::delete('student/{username}', 'ResourceStudentController@destroy')->name('delete.student');
    Route::get('levels', 'RegistrarController@levels')->name('registrar.levels.list');

    Route::post('section', 'ResourceSectionController@store')->name('add.section');
    Route::get('section/{id}', 'RegistrarController@section')->name('registrar.section');
    Route::post('subject', 'ResourceSubjectController@store')->name('add.subject');

});

Route::prefix('resource')->group(function () {
    Route::get('sections', 'ResourceSectionController@index')->name('section.list');
//    Route::get('subjects', 'ResourceSubjectController@index')->name('subject.list');
});

