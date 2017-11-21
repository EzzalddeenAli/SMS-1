@extends('dashboard.layouts.main')

@section('title', 'Admin Dashboard')

@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection

@section('body')
    <div class="row" id="teachers-table">
        <div class="col-lg-12">
            @if($errors->any())
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }} </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session('status'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><span
                                aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    {{ session('status') }}
                </div>
            @endif

        <!-- menu bar -->
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search for student">
            </div>
            <div class="form-horizontal form-group">
                <div class="col-sm-1">
                    <button v-on:click="showAddModal('student')" class="btn btn-default" title="add teacher"><i class="fa fa-plus fa-lg"></i></button>
                </div>

                <div class="col-sm-3">
                    <form action="{{ route('admin.card.publish') }}" method="post">
                        {{ csrf_field() }}
                        <select name="status" class="form-control" onchange="this.form.submit()">
                            <option value="0">Report Cards</option>
                            <option value="0"> Hide Report Cards</option>
                            <option value="1"> Show Report Cards</option>
                        </select>
                    </form>
                </div>

            </div>

            <div class="clearfix"></div>
                <br>
                <!-- ./menu bar-->
            <div class="table-responsive">
                <table class="table table-bordered table-hover">

                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Username</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Last Name</th>
                        <th>Age</th>
                        <th>Section</th>
                        <th colspan="10" class="text-center">Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($students as $student)
                        <tr>
                            <td>{{++$index}}</td>
                            <td>{{$student->username}}</td>
                            <td>{{$student->first_name}}</td>
                            <td>{{$student->middle_name}}</td>
                            <td>{{$student->last_name}}</td>
                            <td>{{$student->age}}</td>
                            <td>{{$student->section->name}}</td>
                            <td>
                                <button v-on:click="showDeleteModal('student', '{{$student->username}}')" class="btn btn-danger delete-btn" title="Delete Student"><i class="fa fa-trash-o fa-lg"></i></button>
                            </td>
                            <td>
                                <button v-on:click="showEditModal('/resource/students/', '{{$student->username}}')" class="btn btn-info edit-btn" title="Edit Student"><i class="fa fa-edit fa-lg"></i></button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
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
@endsection