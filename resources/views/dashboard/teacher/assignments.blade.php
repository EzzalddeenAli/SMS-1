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

                @if (session('status'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert"><span
                                    aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        {{ session('status') }}
                    </div>
                @endif

                    @foreach ($sections as $section)
                        @if(count($section->subjects) > 0)
                    <div class="col-md-6">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">{{ $section->name }}</h3>
                                <div class="btn-group btn-group-sm pull-right">
                                    <a href="{{ route('section', [$section->id]) }}" class="btn btn-default"><i class="fa fa-eye"></i></a>
                                    <button class="btn btn-primary" v-on:click="showAddModal('assignment', {{ $section->id }})"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body table-responsive" style="max-height: 300px; overflow-y: scroll">
                                <table class="table table-bordered">
                                    <tbody>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Task</th>
                                        <th>Description</th>
                                        <th>Deadline</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach($section->subjects as $subject)
                                        @if(count($subject->assignments) > 0)
                                        <tr>
                                            <td colspan="10" class="text-center bg-info"><b>{{ $subject->name }}</b></td>
                                        </tr>
                                        @foreach($subject->assignments as $ind=>$assignment)
                                        <tr>
                                            <td>{{ ++$ind }}.</td>
                                            <td>{{ $assignment->title }}</td>
                                            <td>{{ $assignment->description }}</td>
                                            <td>{{ $assignment->deadline }}</td>
                                            <td class="text-center" style="width: 30px; padding: 4px">
                                                <button v-on:click="showDeleteModal('assignment', '{{ $assignment }}')" class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i></button>
                                            </td>
                                            <td class="text-center" style="width: 30px; padding: 4px">
                                                <button v-on:click="showEditModal('/resource/assignments/', '{{ $assignment->id }}/edit')" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></button>
                                            </td>
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
                            <h4 class="modal-title">Edit Assignments</h4>
                        </div>
                        <form action="{{ route('assignments.update') }}" method="post">
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
                            <h4 class="modal-title">Add Assignment</h4>
                        </div>
                        <form action="{{ route('assignments.store') }}" method="post">
                            {{ csrf_field() }}
                            <div class="modal-body">

                                <div id="add-modal-body">
                                    <modal-add-form v-for="(type, field) in fields" :options="subjectFields" :extra-options="{'subject-name': 'text'}" :form-name="field" :form-type="type"></modal-add-form>
                                    <input type="hidden" name="subject_id" v-model="assignment.subject_id">
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
                            <h4 class="modal-title">Delete Assignment</h4>
                        </div>

                        <div id="delete-modal-body">
                            <form :action="deleteLink" method="post">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                                <div class="modal-body" v-html="username">
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
    @include('dashboard.teacher.inc.sidebar-control')
@endsection