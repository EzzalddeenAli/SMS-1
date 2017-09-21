@extends('dashboard.layouts.main')

@section('sidebar')
    @include('dashboard.teacher.sidebar')
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
            <input type="text" class="form-control" placeholder="Search for section">
            <br>
            <table class="table table-bordered table-hover">

                <thead>
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th colspan="10" class="text-center">Action</th>
                </tr>
                </thead>

                <tbody>
                @if(isset($students))
                    @foreach($students as $student)
                        <tr>
                            <td>{{++$index}}</td>
                            <td>{{$student->first_name}}</td>
                            <td>{{$student->middle_name}}</td>
                            <td>{{$student->last_name}}</td>
                            <td>
                                <button v-on:click="showEditModal('{{$section_id}}/', '{{$student->username}}')" class="btn btn-primary" title="edit grades"><i class="fa fa-graduation-cap fa-lg"></i></button>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>

            </table>
        </div>
    </div>

    <div>

        <!--edit modal-->
        <div class="modal fade" id="edit-modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Edit Student Grades</h4>
                    </div>
                    <form action="{{ route('edit.grade') }}" method="post">
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

        <div id="add-modal-body"></div>
        <div id="delete-modal-body"></div>

    </div>
@endsection