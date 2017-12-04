<?php
Route::view('/lte', 'dashboard.test');
Route::get('/', 'HomeController@index')->name('home.main');
//Route::get('home', 'HomeController@index')->name('user.dashboard');

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
    Route::get('/grades/download', 'StudentController@gradesDownload');
    Route::get('/permit', 'StudentController@permit')->name('student.permit');
    Route::get('/teachers/rate', 'StudentController@teachers')->name('student.teachers');
    Route::post('/rate', 'StudentController@rate')->name('student.rate');
});

Route::prefix('teacher')->group(function () {
    //Login Controllers
    Route::get('login', 'Auth\TeacherLoginController@login')->name('teacher.login');
    Route::post('login', 'Auth\TeacherLoginController@authenticate')->name('teacher.authenticate');

    //Dashboard Controllers
    Route::get('/', 'TeacherController@index')->name('teacher.dashboard');
    Route::get('sections', 'TeacherController@sections')->name('teacher.section.list');
    Route::get('/section/{subject_id}', 'TeacherController@section')->name('section');
    Route::get('/assignments', 'TeacherController@assignments')->name('teacher.assignments.list');
});

Route::prefix('admin')->group(function () {
    //Login Controllers
    Route::get('login', 'Auth\AdminLoginController@login')->name('admin.login');
    Route::post('login', 'Auth\AdminLoginController@authenticate')->name('admin.authenticate');

    //Dashboard Controllers
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('teachers', 'AdminController@teachers')->name('admin.teacher.list');
    Route::get('students', 'AdminController@students')->name('admin.student.list');
    Route::post('card/publish', 'AdminController@publish')->name('admin.card.publish');
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
    Route::get('assignments', 'ResourceImageController@index')->name('assignment.list');

    //PUT THIS TO BOTTOM!
    //Resource Grade...
    Route::get('/{section_id}/{username}', 'ResourceGradeController@edit')->name('edit.grade');
    Route::patch('grade', 'ResourceGradeController@update')->name('update.grade');
    //MAKE SURE NOTHING IS BELOW HERE!

});

//for roulette api, don't use
/*Route::get('/callback', function (Illuminate\Http\Request $request) {
    $http = new \GuzzleHttp\Client;

    $response = $http->post('192.168.1.7:8000/oauth/token', [
        'form_params' => [
            'grant_type' => 'authorization_code',
            'client_id' => 3,
            'client_secret' => 'AWQbbwrrDSr5Z5FV7eQKvQfAFtVYtPGgYC8Waw05',
            'redirect_uri' => '192.168.1.7:8080/callback',
            'code' => $request->code,
        ],
    ]);
    return json_decode((string) $response->getBody(), true);
});*/