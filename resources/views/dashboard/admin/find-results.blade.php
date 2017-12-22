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
                                {!! Form::close() !!}
                            </div>
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
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Add Student</h4>
                        </div>
                        <form action="{{ route('add.student') }}" method="post">
                            {{ csrf_field() }}
                            <div class="modal-body">

                                <div id="add-modal-body">
                                    <modal-add-form v-for="(type, field) in fields" :form-name="field" :form-type="type"></modal-add-form>
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