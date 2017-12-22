<?php
Route::get('/', 'HomeController@index')->name('home.main');
//Route::get('home', 'HomeController@index')->name('user.dashboard');
Route::get('/applicant', function () {
    $data = [
        'title' => 'JILCS Application for Admission',
        'num' => ['wasd', 'wasder', 'wasdest']
    ];

    $pdf = PDF::loadView('pdf.test', $data);
    return $pdf->stream('invoice.pdf');
    return view('pdf.test', $data);
});

//Auth::routes();
//Route::get('logout', 'Auth\LoginController@logout');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::prefix('student')->group(function () {
    //Login Controllers
    Route::get('login', 'Auth\StudentLoginController@login')->name('student.login');
//    Route::get('login', 'Auth\StudentLoginController@login')->name('login');
    Route::post('login', 'Auth\StudentLoginController@authenticate')->name('student.authenticate');

    //Dashboard Controllers
    Route::get('/', 'StudentController@index')->name('student.dashboard');
    Route::get('/grades', 'StudentController@grades')->name('student.grades');
    Route::get('/calendar', 'StudentController@calendar')->name('student.calendar');
//    Route::get('/grades/download', 'StudentController@gradesDownload');
    Route::get('/permit', 'StudentController@permit')->name('student.permit');
    Route::get('/teachers/rate', 'StudentController@teachers')->name('student.teachers');
    Route::post('/rate', 'StudentController@rate')->name('student.rate');
    Route::get('school/info', 'StudentController@school_info')->name('student.school-info');
});

Route::prefix('teacher')->group(function () {
    //Login Controllers
    Route::get('login', 'Auth\TeacherLoginController@login')->name('teacher.login');
    Route::post('login', 'Auth\TeacherLoginController@authenticate')->name('teacher.authenticate');

    //Dashboard Controllers
    Route::get('/', 'TeacherController@index')->name('teacher.dashboard');
    Route::get('sections', 'TeacherController@sections')->name('teacher.section.list');
    Route::get('calendar', 'TeacherController@calendar')->name('teacher.calendar');
    Route::get('/section/{subject_id}', 'TeacherController@section')->name('section');
    Route::get('/assignments', 'TeacherController@assignments')->name('teacher.assignments.list');
    Route::get('school/info', 'TeacherController@school_info')->name('teacher.school-info');
});

Route::prefix('admin')->group(function () {
    //Login Controllers
    Route::get('login', 'Auth\AdminLoginController@login')->name('admin.login');
    Route::post('login', 'Auth\AdminLoginController@authenticate')->name('admin.authenticate');

    //Dashboard Controllers
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('school/info', 'AdminController@school_info')->name('admin.school-info');
    Route::get('school/info/index', 'ResourceSchoolInfoController@index')->name('admin.school-info.index');
    Route::patch('school/info/update', 'ResourceSchoolInfoController@update')->name('admin.school-info.update');
    Route::get('teachers', 'AdminController@teachers')->name('admin.teacher.list');
    Route::get('teachers/ratings', 'AdminController@ratings')->name('admin.teacher.ratings');
//    Route::get('students', 'AdminController@students')->name('admin.student.list');
    Route::get('calendar', 'AdminController@calendar')->name('admin.calendar');
    Route::get('levels', 'AdminController@levels')->name('admin.levels.list');
    Route::get('search', 'AdminController@search')->name('admin.search');
    Route::post('find', 'AdminController@find')->name('admin.find');
    Route::post('find/basic', 'AdminController@find_basic')->name('admin.find.basic');
    Route::post('card/publish', 'AdminController@publish')->name('admin.card.publish');

    Route::get('student/{username}/profile', 'AdminController@student_profile')->name('admin.student.profile');
    Route::get('student/{username}/permit', 'AdminController@permit')->name('admin.permit');
    Route::get('student/{username}/card', 'AdminController@report_card')->name('admin.report.card');
    Route::get('section/{id}/subjects', 'AdminController@section')->name('admin.section.subjects');
    Route::get('section/{section}/assignments', 'AdminController@assignments')->name('admin.section.assignments');
    Route::get('/layout/{area}', 'AdminController@layout')->name('admin.layout');
});

Route::prefix('registrar')->group(function () {
    //Login Controllers
    Route::get('login', 'Auth\RegistrarLoginController@login')->name('registrar.login');
    Route::post('login', 'Auth\RegistrarLoginController@authenticate')->name('registrar.authenticate');

    //Dashboard Controllers
    Route::get('/', 'RegistrarController@index')->name('registrar.dashboard');
    Route::get('teachers', 'RegistrarController@teachers')->name('registrar.teacher.list');
    Route::get('students', 'RegistrarController@students')->name('registrar.student.list');
    Route::get('section/{id}/subjects', 'RegistrarController@section')->name('registrar.section.subjects');
    Route::get('levels', 'RegistrarController@levels')->name('registrar.levels.list');


});

//Resource
/* Don't make a resource that retrieves all data from model */
Route::prefix('resource')->group(function () {
    //Resource Level...
    Route::get('levels', 'ResourceLevelController@index')->name('level.list');
    Route::get('level/{id}', 'ResourceLevelController@sections')->name('level.sections');

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

    //Resource Images
    Route::get('image', 'ResourceImageController@edit')->name('edit.image');
    Route::patch('image', 'ResourceImageController@update')->name('update.image');

    //Resource Assignments
    Route::resource('assignments', 'ResourceAssignmentController', ['except' => [
        'update'
    ]]);
    Route::patch('assignments', 'ResourceAssignmentController@update')->name('assignments.update');

    //Resource Events
    Route::resource('events', 'ResourceEventController', ['except' => [
        'destroy', 'update'
    ]]);
    Route::patch('events/edit', 'ResourceEventController@update');
    Route::delete('events', 'ResourceEventController@destroy');

    //PUT THIS TO BOTTOM!
    //Resource Grade...
    Route::get('/{section_id}/{username}', 'ResourceGradeController@edit')->name('edit.grade');
    Route::patch('grade', 'ResourceGradeController@update')->name('update.grade');
    //MAKE SURE NOTHING IS BELOW HERE!

});