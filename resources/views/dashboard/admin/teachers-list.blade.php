@extends('dashboard.layouts.main')

@section('body')
<div class="row" id="teachers-table">
    <div class="col-lg-12">
        @if($errors->any())
            @foreach($errors->all() as $error)
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ $error }}
            </div>
            @endforeach
        @endif
        <input type="text" class="form-control" placeholder="Search for teacher">
        <br>
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
                <td>{{$teacher->advisory}}</td>
                <td>
                    <button data-uname="{{$teacher->username}}" class="btn btn-danger delete-btn"><i class="fa fa-trash-o fa-lg"></i></button>
                </td>
                <td>
                    <button v-on:click="showEditModal('{{$teacher->username}}')" class="btn btn-info edit-btn"><i class="fa fa-edit fa-lg"></i></button>
                </td>
            </tr>
            @endforeach
            </tbody>

        </table>
    </div>
</div>

<div class="modal fade" id="edit-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Teacher</h4>
            </div>
            <form action="{{ route('edit.teacher') }}" method="post">
                {{ csrf_field() }}
                {{ method_field('patch') }}
                <div class="modal-body">

                    <div id="edit-modal-body">
                        <modal-form v-for="(item, key) in responses" :form-name="key" :form-data="item" :is-id="checkIfId(key)"></modal-form>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection