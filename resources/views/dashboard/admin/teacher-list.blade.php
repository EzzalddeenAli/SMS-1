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

        <!-- menu bar -->
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search for teacher">
            </div>
            <div class="form-horizontal form-group">
                <button v-on:click="showAddModal('teacher')" class="btn btn-default" title="add teacher"><i class="fa fa-plus fa-lg"></i></button>
            </div>
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
                    <th>Advisory</th>
                    <th colspan="10" class="text-center">Action</th>
                </tr>
                </thead>

                <tbody>
                @foreach($teachers as $teacher)
                <tr>
                    <td>{{++$index}}</td>
                    <td>{{$teacher->username}}</td>
                    <td>{{$teacher->first_name}}</td>
                    <td>{{$teacher->middle_name}}</td>
                    <td>{{$teacher->last_name}}</td>
                    <td>{{$teacher->age}}</td>
                    <td>{{$teacher->advisory_name($teacher->advisory)}}</td>
                    <td>
                        <button v-on:click="showAssignModal('teacher', '{{$teacher->id}}')" class="btn btn-primary edit-btn" title="Assign Teacher to a section"><i class="fa fa-edit fa-lg"></i></button>
                    </td>
                    <td>
                        <button v-on:click="showEditModal('/resource/teacher/', '{{$teacher->username}}')" class="btn btn-info edit-btn" title="Edit Teacher"><i class="fa fa-edit fa-lg"></i></button>
                    </td>
                    <td>
                        <button v-on:click="showDeleteModal('teacher', '{{$teacher->username}}')" class="btn btn-danger delete-btn" title="Delete Teacher"><i class="fa fa-trash-o fa-lg"></i></button>
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
@endsection