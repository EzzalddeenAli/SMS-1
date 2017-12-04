@extends('dashboard.layouts.master')
@section('title', 'Teacher Dashboard')
@section('sidebar')
    @include('dashboard.teacher.inc.sidebar')
@endsection

@section('content-header')
    <section class="content-header">
        <h1>
            Assignments
        </h1>
        @include('dashboard.inc.breadcrumbs')
    </section>
@endsection

@section('content-main')
    <!-- Main content -->
    <section class="content container-fluid">

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

                    @foreach ($sections as $section)
                        @if(count($section->subjects) > 0)
                    <div class="col-md-6">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">{{ $section->name }}</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table class="table table-bordered">
                                    <tbody>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Task</th>
                                        <th>Description</th>
                                        <th>Deadline</th>
                                    </tr>
                                    @foreach($section->subjects as $subject)
                                        @if(count($subject->assignments) > 0)
                                        <tr>
                                            <td colspan="4" class="text-center bg-info"><b>{{ $subject->name }}</b></td>
                                        </tr>
                                        @foreach($subject->assignments as $ind=>$assignment)
                                        <tr>
                                            <td>{{ ++$ind }}.</td>
                                            <td>{{ $assignment->title }}</td>
                                            <td>{{ $assignment->description }}</td>
                                            <td>{{ $assignment->deadline }}</td>
                                        </tr>
                                        @endforeach
                                        @endif
                                    @endforeach
                                    </tbody></table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                        @endif
                    @endforeach
            </div>
        </div>

        <div>

            <!--edit modal-->
            <div class="modal fade" id="edit-modal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Edit Subject Assignments</h4>
                        </div>
                        <form action="{{ route('update.grade') }}" method="post">
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
            <div id="assign-modal-body"></div>

        </div>

    </section>
    <!-- /.content -->
@endsection

@section('sidebar-control')
    @include('dashboard.teacher.inc.sidebar-control')
@endsection