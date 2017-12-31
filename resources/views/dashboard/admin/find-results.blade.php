@extends('dashboard.layouts.master')
@section('title', 'Admin Dashboard')
@section('sidebar')
    @include('dashboard.admin.inc.sidebar')
@endsection

@section('content-header')
    <section class="content-header">
        <h1>
            Find Student
        </h1>
        @include('dashboard.inc.breadcrumbs')
    </section>
@endsection

@section('content-main')
    <!-- Main content -->
    <section class="content">
        <div class="row" id="teachers-table">
            @if($func === 'student-list')
            <div class="form-horizontal form-group">
                <div class="col-sm-1">
                    <button v-on:click="showAddModal('student')" class="btn btn-success btn-sm" title="add student"><i class="fa fa-plus fa-lg"></i> Add Student</button>
                </div>
            </div>
            @endif

            <div class="col-xs-12">

                @if($errors->any())
                    <br>
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }} </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">{{ $message }}</h3>

                        <div class="box-tools">
                            {!! Form::open(['route' => 'admin.find.basic']) !!}
                            <div class="input-group input-group-sm" style="width: 200px;">
                                <input name="user" value="student" type="hidden">
                                <input name="func" value="{{ $func }}" type="hidden">
                                <input name="basic_search" class="form-control pull-right" placeholder="Search"
                                       type="text">

                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Last Name</th>
                                    <th>Middle Name</th>
                                    <th>First Name</th>
                                    <th>Age</th>
                                    <th>Section</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($results as $ind=>$result)
                                    <tr>
                                        <td>{{ ++$ind }}.</td>
                                        <td>{{ $result->last_name }}</td>
                                        <td>{{ $result->middle_name }}</td>
                                        <td>{{ $result->first_name }}</td>
                                        <td>{{ $result->age }}</td>
                                        <td>{{ $result->section->name }}</td>
                                        <td>
                                            @if($func === 'report_card')
                                                <a href="{{ route('admin.report.card', ['username' => $result->username]) }}"
                                                   class="btn btn-primary btn-sm">view report card</a>
                                            @elseif($func === 'permit')
                                                <a href="{{ route('admin.permit', ['username' => $result->username]) }}"
                                                   class="btn btn-primary btn-sm">View permit</a>
                                            @elseif($func === 'student-list')
                                                <button v-on:click="showDeleteModal('student', '{{ $result->username }}')"
                                                        class="btn btn-danger btn-sm delete-btn" title="Delete"><i class="fa fa-trash-o fa-lg"></i></button>
                                                <button v-on:click="showEditModal('/resource/students/', '{{ $result->username }}')"
                                                        class="btn btn-info btn-sm edit-btn" title="Edit"><i class="fa fa-edit fa-lg"></i></button>
                                                <a href="{{ route('admin.student.profile', ['username' => $result->username]) }}" class="btn btn-primary btn-sm" title="Profile">
                                                    <i class="fa fa-user"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </div>

        <div>
            <!--edit modal-->
            <div class="modal fade" id="edit-modal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Edit Student</h4>
                        </div>
                        <form action="{{ route('update.student') }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('patch') }}
                            <div class="modal-body">

                                <div id="edit-modal-body">
                                    <modal-edit-form v-for="(item, key) in responses" :form-name="key" :form-data="item" :is-id="checkIfId(key)"></modal-edit-form>
                                    <modal-select-form :user-type="'student'"></modal-select-form>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /. edit modal -->

            <!-- add modal -->
            <div class="modal fade" id="add-modal">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Add Student</h4>
                        </div>
                        <form action="{{ route('add.student') }}" method="post">
                            {{ csrf_field() }}
                            <div class="modal-body">
{{--                                <div id="add-modal-body">
                                    <modal-add-form v-for="(type, field) in fields" :form-name="field" :form-type="type"></modal-add-form>
                                    <modal-select-form :user-type="'student'"></modal-select-form>
                                </div>--}}

                            <!-- TAB NAVIGATION -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="active"><a href="#tab1" role="tab" data-toggle="tab">Student Data <span class="text-red">*</span></a></li>
                                    <li><a href="#tab2" role="tab" data-toggle="tab">Personal Data <span class="text-red">*</span></a></li>
                                    <li><a href="#tab3" role="tab" data-toggle="tab">Family Background</a></li>
                                    <li><a href="#tab4" role="tab" data-toggle="tab">Educational Background</a></li>
                                </ul>
                                <!-- TAB CONTENT -->
                                <div class="tab-content">
                                    <div class="active tab-pane fade in" id="tab1">

                                        {{ Form::bsText('username *') }}
                                        {{ Form::bsText('password *') }}
                                        {{ Form::bsText('first_name *') }}
                                        {{ Form::bsText('middle_name *') }}
                                        {{ Form::bsText('last_name *') }}
                                        {{ Form::bsNumber('age *') }}
                                        <div id="add-modal-body">
                                            <modal-select-form :user-type="'student'"></modal-select-form>
                                        </div>

                                    </div>
                                    <div class="tab-pane fade" id="tab2">

                                        <div class="form-group">
                                            <label for="gender">Gender</label>
                                            <span class="text-red">*</span>
                                            <select name="gender" id="gender" class="form-control">
                                                <option value=""> -- Select One --</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                        </div>

                                        {{ Form::bsText('birthday *') }}
                                        {{ Form::bsText('birth_place') }}
                                        {{ Form::bsText('nationality *') }}
                                        {{ Form::bsText('religion') }}
                                        {{ Form::bsText('school_last_attended') }}
                                        {{ Form::bsText('level_applied') }}

                                    </div>
                                    <div class="tab-pane fade" id="tab3">
                                        {{ Form::bsText('mother_name') }}
                                        {{ Form::bsNumber('mother_age') }}
                                        {{ Form::bsText('mother_nationality') }}
                                        {{ Form::bsText('mother_occupation') }}
                                        {{ Form::bsNumber('mother_contact') }}
                                        {{ Form::bsText('mother_work_address') }}
                                        {{ Form::bsText('father_name') }}
                                        {{ Form::bsNumber('father_age') }}
                                        {{ Form::bsText('father_nationality') }}
                                        {{ Form::bsText('father_occupation') }}
                                        {{ Form::bsNumber('father_contact') }}
                                        {{ Form::bsText('father_work_address') }}
                                    </div>
                                    <div class="tab-pane fade" id="tab4">
                                        @php($levels = ['nursery', 'kinder', 'preparatory'])
                                        @for($i = 1; $i < 13; $i++ )
                                            @php(array_push($levels, "grade$i"))
                                        @endfor

                                        @foreach($levels as $level)
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="level[]" class="control-label">Level</label>
                                                    <input class="form-control" disabled="" name="level[]" value="{{ $level }}" id="level[]" type="text">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="name_of_school[]" class="control-label">Name Of School</label>
                                                    <input class="form-control" name="name_of_school[]" id="name_of_school[]" type="text">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="year_attended[]" class="control-label">Year Attended</label>
                                                    <input class="form-control" name="year_attended[]" id="year_attended[]" type="text">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="honors_awards[]" class="control-label">Honors Awards</label>
                                                    <input class="form-control" name="honors_awards[]" id="honors_awards[]" type="text">
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /. add modal -->

            <!-- delete modal -->
            <div class="modal fade" id="delete-modal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Delete Student</h4>
                        </div>

                        <div id="delete-modal-body">
                            <form :action="deleteLink" method="post">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                                <div class="modal-body" v-text="username">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div><!-- /. delete modal -->

            <div id="assign-modal-body"></div>
        </div>

    </section>
    <!-- /.content -->
@endsection

@section('sidebar-control')
    @include('dashboard.admin.inc.sidebar-control')
@endsection