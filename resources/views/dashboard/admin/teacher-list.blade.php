@extends('dashboard.layouts.master')
@section('title', 'Admin Dashboard')
@section('sidebar')
    @include('dashboard.admin.inc.sidebar')
@endsection

@section('content-header')
    <section class="content-header">
        <h1>
            Find Teacher
        </h1>
@include('dashboard.inc.breadcrumbs')
    </section>
@endsection

@section('content-main')
    <!-- Main content -->
    <section class="content">

        <div class="row" id="teachers-table">
            @if($func === 'teacher-list')
                <div class="form-horizontal form-group">
                    <div class="col-sm-1">
                        <button v-on:click="showAddModal('teacher')" class="btn btn-success btn-sm" title="add teacher"><i class="fa fa-plus fa-lg"></i> Add Teacher</button>
                    </div>
                </div>
            @endif

            <div class="col-xs-12">

                @if($errors->any())
                    <br>
                    <div class="alert alert-danger" style="max-height: 150px; overflow-y: scroll">
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
                            {!! Form::open(['route' => 'admin.find.basic', 'method' => 'get']) !!}
                            <div class="input-group input-group-sm" style="width: 200px;">
                                <input name="user" value="teacher" type="hidden">
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
                                    <th>Username</th>
                                    <th>First Name</th>
                                    <th>Middle Name</th>
                                    <th>Last Name</th>
                                    <th>Age</th>
                                    <th>Advisory</th>
                                    {{--<th>Rating</th>--}}
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($results as $ind=>$teacher)
                                    <tr>
                                        @php
                                            $advisory = $teacher->advisory_name($teacher->advisory);
                                            /*$rating = $teacher->averageRating;*/
                                        @endphp
                                        <td>{{++$ind}}</td>
                                        <td>{{$teacher->username}}</td>
                                        <td>{{$teacher->first_name}}</td>
                                        <td>{{$teacher->middle_name}}</td>
                                        <td>{{$teacher->last_name}}</td>
                                        <td>{{$teacher->age}}</td>
                                        <td>{{$advisory !== null ? $advisory : 'None'}}</td>
                                        {{--<td class="{{ $rating >= 3.5 ? 'text-success' : ($rating >= 2.5 ? 'text-primary' : ($rating > 0 ? 'text-danger' : '')) }}">
                                            {{ $rating !== null ? $rating : 'None' }}
                                        </td>--}}
                                        <td>
                                            <button v-on:click="showAssignModal('teacher', '{{$teacher->id}}')"
                                                    class="btn btn-primary btn-sm edit-btn" title="Assign Teacher to a section"><i class="fa fa-edit fa-lg"></i></button>
                                            <button v-on:click="showEditModal('/resource/teacher/', '{{$teacher->username}}')"
                                                    class="btn btn-info btn-sm edit-btn" title="Edit Teacher"><i class="fa fa-edit fa-lg"></i></button>
                                            <button v-on:click="showDeleteModal('teacher', '{{$teacher->username}}')"
                                                    class="btn btn-danger btn-sm delete-btn" title="Delete Teacher"><i class="fa fa-trash-o fa-lg"></i></button>
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
                            <h4 class="modal-title">Edit Teacher</h4>
                        </div>
                        <form action="{{ route('update.teacher') }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('patch') }}
                            <div class="modal-body">

                                <div id="edit-modal-body">
                                    <modal-edit-form v-for="(item, key, index) in responses" :key="index" :form-name="key" :form-data="item" :is-id="checkIfId(key)"></modal-edit-form>
                                    <modal-select-form :user-type="'teacher'"></modal-select-form>
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
                            <h4 class="modal-title">Add Teacher</h4>
                        </div>
                        <form action="{{ route('add.teacher') }}" method="post">
                            {{ csrf_field() }}
                            <div class="modal-body">

                                <div id="add-modal-body">
                                    <modal-add-form v-for="(type, field, index) in fields" :key="index" :form-name="field" :form-type="type"></modal-add-form>
                                    <modal-select-form :user-type="'teacher'"></modal-select-form>
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
                            <h4 class="modal-title">Delete Teacher</h4>
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

            <!-- assign modal -->
            <div class="modal fade" id="assign-modal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Assign Teacher subjects</h4>
                        </div>

                        <div id="assign-modal-body">
                            <form action="{{ route('update.subjects') }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('patch') }}
                                <div id="assign-modal-body">
                                    <assign-tab :teacher-id="id"></assign-tab>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div><!-- /. assign modal -->
        </div>

    </section>
    <!-- /.content -->
@endsection

@section('sidebar-control')
    @include('dashboard.admin.inc.sidebar-control')
@endsection